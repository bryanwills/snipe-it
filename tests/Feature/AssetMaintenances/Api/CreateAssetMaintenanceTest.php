<?php

namespace Tests\Feature\AssetMaintenances\Api;

use App\Models\Asset;
use App\Models\AssetMaintenance;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CreateAssetMaintenanceTest extends TestCase
{


    public function testRequiresPermissionToCreateAssetMaintenance()
    {
        $this->actingAsForApi(User::factory()->create())
            ->postJson(route('api.maintenances.store'))
            ->assertForbidden();
    }
    public function testCanCreateAssetMaintenance()
    {

        Storage::fake('public');
        $actor = User::factory()->superuser()->create();

        $asset = Asset::factory()->create();
        $supplier = Supplier::factory()->create();

        $response = $this->actingAsForApi($actor)
            ->postJson(route('api.maintenances.store'), [
                'title' => 'Test Maintenance',
                'asset_id' => $asset->id,
                'supplier_id' => $supplier->id,
                'asset_maintenance_type' => 'Maintenance',
                'start_date' => '2021-01-01',
                'completion_date' => '2021-01-10',
                'is_warranty' => '1',
                'cost' => '100.00',
                'image' => UploadedFile::fake()->image('test_image.png'),
                'notes' => 'A note',
            ])
            ->assertOk()
            ->assertStatus(200);

        \Log::error($response->json());
        // Since we rename the file in the ImageUploadRequest, we have to fetch the record from the database
        $assetMaintenance = AssetMaintenance::where('title', 'Test Maintenance')->first();

        // Assert file was stored...
        Storage::disk('public')->assertExists(app('asset_maintenances_path').$assetMaintenance->image);

        $this->assertDatabaseHas('asset_maintenances', [
            'asset_id' => $asset->id,
            'supplier_id' => $supplier->id,
            'asset_maintenance_type' => 'Maintenance',
            'title' => 'Test Maintenance',
            'is_warranty' => 1,
            'start_date' => '2021-01-01',
            'completion_date' => '2021-01-10',
            'notes' => 'A note',
            'image' => $assetMaintenance->image,
            'created_by' => $actor->id,
        ]);
    }



}
