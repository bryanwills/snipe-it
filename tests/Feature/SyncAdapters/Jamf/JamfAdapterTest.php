<?php

namespace Tests\Feature\SyncAdapters\Jamf;

use App\Models\Statuslabel;
use App\Models\SyncAdapterConfig;
use App\Models\SyncAdapterInstance;
use App\SyncAdapters\Jamf\JamfAdapter;
use App\SyncAdapters\SyncAdapter;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

/**
 * End-to-end coverage for the Jamf Pro adapter through
 * SyncAdapter. Mocks the Jamf Pro API, asserts assets +
 * asset_external_sources land correctly, and that the totalCount /
 * pagination termination works.
 */
class JamfAdapterTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Statuslabel::factory()->rtd()->create();
    }

    public function test_pulls_computers_from_jamf_and_creates_assets()
    {
        $adapter = $this->configuredJamfAdapter();

        Http::fake([
            '*/api/oauth/token' => $this->jamfTokenResponse(),
            '*/api/v1/computers-inventory*' => Http::response([
                'totalCount' => 2,
                'results' => [
                    $this->jamfComputer(id: 42, name: 'lab-mac-01', model: 'iMac'),
                    $this->jamfComputer(id: 99, name: 'lab-mac-02', model: 'Mac mini'),
                ],
            ]),
        ]);

        foreach ($adapter->pull() as $record) {
            SyncAdapter::syncFromRecord($record);
        }

        $this->assertDatabaseCount('asset_external_sources', 2);
        $this->assertDatabaseHas('asset_external_sources', ['source' => 'jamf', 'external_id' => '42']);
        $this->assertDatabaseHas('asset_external_sources', ['source' => 'jamf', 'external_id' => '99']);
        $this->assertDatabaseHas('assets', ['name' => 'lab-mac-01']);

        // Laravel's default array-shaped query encoding produces the bracketed
        // form and Jamf silently drops it, leaving every asset with
        // no hardware section (and no model id). The client hand-builds
        // the query string to force the API shape Jamf actually reads.
        Http::assertSent(function ($request) {
            if (!str_contains($request->url(), '/api/v1/computers-inventory')) {
                return false;
            }
            $url = $request->url();

            return str_contains($url, 'section=GENERAL')
                && str_contains($url, 'section=HARDWARE')
                && str_contains($url, 'section=OPERATING_SYSTEM')
                && str_contains($url, 'section=USER_AND_LOCATION')
                && !str_contains($url, 'section%5B')
                && !str_contains($url, 'section[');
        });
    }

    public function test_normalized_record_carries_expected_fields()
    {
        $adapter = $this->configuredJamfAdapter();

        Http::fake([
            '*/api/oauth/token' => $this->jamfTokenResponse(),
            '*/api/v1/computers-inventory*' => Http::response([
                'totalCount' => 1,
                'results' => [
                    $this->jamfComputer(
                        id: 7,
                        name: 'design-mbp',
                        model: 'MacBook Pro (16-inch, M3)',
                        serialNumber: 'C02XYZ',
                        macAddress: 'aa:bb:cc:11:22:33',
                        osName: 'macOS',
                        osVersion: '14.2.1',
                        lastContactTime: '2026-01-15T10:00:00.000Z',
                    ),
                ],
            ]),
        ]);

        $records = iterator_to_array($adapter->pull());
        $this->assertCount(1, $records);

        $record = $records[0];
        $this->assertSame('jamf', $record->sourceKey);
        $this->assertSame('7', $record->sourceId);
        $this->assertSame('design-mbp', $record->hostname);
        $this->assertSame('MacBook Pro (16-inch, M3)', $record->hardwareModel);
        $this->assertSame('C02XYZ', $record->hardwareSerial);
        $this->assertSame('Apple', $record->manufacturer);
        $this->assertSame('aa:bb:cc:11:22:33', $record->primaryMac);
        $this->assertSame('macOS', $record->os);
        $this->assertSame('14.2.1', $record->osVersion);
        $this->assertNotNull($record->lastSeen);
    }

    private function configuredJamfAdapter(): JamfAdapter
    {
        $instance = SyncAdapterInstance::where('slug', 'jamf')->firstOrFail();
        SyncAdapterConfig::put($instance->id, 'url', 'https://example.jamfcloud.com');
        SyncAdapterConfig::put($instance->id, 'client_id', Crypt::encrypt('fake-jamf-client-id'));
        SyncAdapterConfig::put($instance->id, 'client_secret', Crypt::encrypt('fake-jamf-client-secret'));

        return new JamfAdapter($instance->fresh());
    }

    /**
     * Jamf Pro's /api/oauth/token response shape. expires_in is
     * whatever the API Client is configured for. The client's bearer
     * cache honors it with a 30-second buffer before re-exchanging.
     * No return type hint because Http::response() inside a fake
     * handler resolves to a promise, not a bare Response.
     */
    private function jamfTokenResponse()
    {
        return Http::response([
            'access_token' => 'fake-jamf-access-token',
            'token_type' => 'Bearer',
            'expires_in' => 3600,
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    private function jamfComputer(
        int $id,
        string $name = 'computer',
        string $model = 'MacBook',
        ?string $serialNumber = null,
        ?string $macAddress = null,
        ?string $osName = 'macOS',
        ?string $osVersion = null,
        ?string $lastContactTime = null,
    ): array {
        return [
            'id' => (string) $id,
            'udid' => 'jamf-udid-'.$id,
            'general' => [
                'name' => $name,
                'lastContactTime' => $lastContactTime,
                'lastEnrolledDate' => null,
            ],
            'hardware' => [
                'make' => 'Apple',
                'model' => $model,
                'modelIdentifier' => 'Mac'.$id,
                'serialNumber' => $serialNumber,
                'macAddress' => $macAddress,
            ],
            'operatingSystem' => [
                'name' => $osName,
                'version' => $osVersion,
            ],
        ];
    }
}
