<?php

namespace Tests\Feature\ReportTemplates;

use App\Models\ReportTemplate;
use App\Models\User;
use PHPUnit\Framework\Attributes\Group;
use Tests\Concerns\TestsPermissionsRequirement;
use Tests\TestCase;

#[Group('custom-reporting')]
class DeleteReportTemplateTest extends TestCase implements TestsPermissionsRequirement
{
    public function testRequiresPermission()
    {
        $reportTemplate = ReportTemplate::factory()->create();

        $this->actingAs(User::factory()->create())
            ->post(route('report-templates.destroy', $reportTemplate->id))
            ->assertRedirect(route('reports/custom'));

        $this->assertNotSoftDeleted($reportTemplate);
    }

    public function testCannotDeleteAnotherUsersReportTemplate()
    {
        $reportTemplate = ReportTemplate::factory()->create();

        $this->actingAs(User::factory()->canViewReports()->create())
            ->delete(route('report-templates.destroy', $reportTemplate->id))
            ->assertRedirect(route('reports/custom'))
            ->assertSessionHas('error', trans('general.generic_model_not_found', ['model' => 'report template']));

        $this->assertNotSoftDeleted($reportTemplate);
    }

    public function testCannotDeleteAnotherUsersSharedReportTemplate()
    {
        $reportTemplate = ReportTemplate::factory()->shared()->create();

        $this->actingAs(User::factory()->canViewReports()->create())
            ->delete(route('report-templates.destroy', $reportTemplate->id))
            ->assertRedirect(route('report-templates.show', $reportTemplate->id))
            ->assertSessionHas('error', trans('general.generic_model_not_found', ['model' => 'report template']));

        $this->assertNotSoftDeleted($reportTemplate);
    }

    public function testCanDeleteAReportTemplate()
    {
        $user = User::factory()->canViewReports()->create();
        $reportTemplate = ReportTemplate::factory()->for($user, 'creator')->create();

        $this->actingAs($user)
            ->delete(route('report-templates.destroy', $reportTemplate->id))
            ->assertRedirect(route('reports/custom'));

        $this->assertSoftDeleted($reportTemplate);
    }
}
