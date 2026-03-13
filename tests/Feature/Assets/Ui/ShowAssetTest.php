<?php

namespace Tests\Feature\Assets\Ui;

use App\Models\Asset;
use App\Models\User;
use Tests\TestCase;

class ShowAssetTest extends TestCase
{
    public function testPermissionRequiredToViewAsset()
    {
        $this->actingAs(User::factory()->create())
            ->get(route('hardware.show', Asset::factory()->create()))
            ->assertForbidden();
    }

    public function testCanViewAsset()
    {
        $asset = Asset::factory()->create();

        $this->actingAs(User::factory()->viewAssets()->create())
            ->get(route('hardware.show', $asset))
            ->assertSeeText($asset->asset_tag)
            ->assertOk();
    }

    public function testPageForAssetWithMissingModelStillRenders()
    {
        $asset = Asset::factory()->create();

        $asset->model_id = null;
        $asset->forceSave();

        $asset->refresh();

        $this->assertNull($asset->fresh()->model_id, 'This test needs model_id to be null to be helpful.');

        $this->actingAs(User::factory()->superuser()->create())
            ->get(route('hardware.show', $asset))
            ->assertOk();
    }
}
