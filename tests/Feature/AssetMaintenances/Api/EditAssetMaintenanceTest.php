<?php

namespace Tests\Feature\AssetMaintenances\Api;

use App\Models\Asset;
use App\Models\AssetMaintenance;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class EditAssetMaintenanceTest extends TestCase
{
    public function testPageRenders()
    {
        $this->actingAs(User::factory()->superuser()->create())
            ->get(route('maintenances.update', AssetMaintenance::factory()->create()->id))
            ->assertOk();
    }


    public function testCanEditAssetMaintenance()
    {
        Storage::fake('public');
        $actor = User::factory()->superuser()->create();
        $asset = Asset::factory()->create();
        $supplier = Supplier::factory()->create();
        $maintenance = AssetMaintenance::factory()->create();

        $response = $this->actingAs($actor)
            ->followingRedirects()
            ->patch(route('maintenances.update',  $maintenance), [
                'title' => 'Test Maintenance',
                'supplier_id' => $supplier->id,
                'asset_maintenance_type' => 'Maintenance',
                'start_date' => '2021-01-01',
                'completion_date' => '2021-01-10',
                'is_warranty' => '1',
                'image' => UploadedFile::fake()->image('test_image.png'),
                'notes' => 'A note',
            ])
            ->assertOk();

        $this->followRedirects($response)->assertSee('alert-success');

        $maintenance->refresh();
        // Assert file was stored...
        Storage::disk('public')->assertExists(app('asset_maintenances_path').$maintenance->image);


        $this->assertDatabaseHas('asset_maintenances', [
            'supplier_id' => $supplier->id,
            'asset_maintenance_type' => 'Maintenance',
            'title' => 'Test Maintenance',
            'is_warranty' => 1,
            'start_date' => '2021-01-01',
            'completion_date' => '2021-01-10',
            'asset_maintenance_time' => '9',
            'notes' => 'A note',
            'image' => $maintenance->image,
        ]);
    }
}
