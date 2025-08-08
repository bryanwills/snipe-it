<?php

namespace Tests\Feature\AssetMaintenances\Ui;

use App\Models\Asset;
use App\Models\AssetMaintenance;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CreateAssetMaintenanceTest extends TestCase
{
    public function testPageRenders()
    {
        $this->actingAs(User::factory()->superuser()->create())
            ->get(route('maintenances.create'))
            ->assertOk();
    }


    public function testCanCreateAssetMaintenance()
    {
        Storage::fake('public');
        $actor = User::factory()->superuser()->create();

        $asset = Asset::factory()->create();
        $supplier = Supplier::factory()->create();

        $this->actingAs($actor)
            ->followingRedirects()
            ->post(route('maintenances.store'), [
                'title' => 'Test Maintenance',
                'selected_assets' => [$asset->id],
                'supplier_id' => $supplier->id,
                'asset_maintenance_type' => 'Maintenance',
                'start_date' => '2021-01-01',
                'completion_date' => '2021-01-10',
                'is_warranty' => '1',
                'cost' => '100.00',
                'image' => UploadedFile::fake()->image('test_image.png'),
                'notes' => 'A note',
            ])
            ->assertOk();

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
            'asset_maintenance_time' => '9',
            'notes' => 'A note',
            'cost' => '100.00',
            'image' => $assetMaintenance->image,
            'created_by' => $actor->id,
        ]);
    }
}
