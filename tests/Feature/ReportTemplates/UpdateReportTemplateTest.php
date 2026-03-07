<?php

namespace Tests\Feature\ReportTemplates;

use App\Models\ReportTemplate;
use App\Models\User;
use PHPUnit\Framework\Attributes\Group;
use Tests\Concerns\TestsPermissionsRequirement;
use Tests\TestCase;

#[Group('custom-reporting')]
class UpdateReportTemplateTest extends TestCase implements TestsPermissionsRequirement
{
    public function testRequiresPermission()
    {
        $this->actingAs(User::factory()->create())
            ->post(route('report-templates.update', ReportTemplate::factory()->create()))
            ->assertStatus(302);
    }

    public function testCannotUpdateAnotherUsersReportTemplate()
    {
        $reportTemplate = ReportTemplate::factory()->create(['name' => 'Original']);

        $this->actingAs(User::factory()->canViewReports()->create())
            ->post(route('report-templates.update', $reportTemplate), [
                'name' => 'Changed',
                'options' => $reportTemplate->options,
            ])
            ->assertStatus(302);

        $this->assertEquals('Original', $reportTemplate->fresh()->name);
    }

    public function testCannotUpdateAnotherUsersSharedReportTemplate()
    {
        $reportTemplate = ReportTemplate::factory()->shared()->create(['name' => 'Original']);

        $this->actingAs(User::factory()->canViewReports()->create())
            ->post(route('report-templates.update', $reportTemplate), [
                'name' => 'Changed',
                'options' => $reportTemplate->options,
            ])
            ->assertStatus(302)
            ->assertSessionHas('error', trans('general.report_not_editable'));

        $this->assertEquals('Original', $reportTemplate->fresh()->name);
    }

    public function testUpdatingReportTemplateRequiresValidFields()
    {
        $user = User::factory()->canViewReports()->create();

        $reportTemplate = ReportTemplate::factory()->for($user, 'creator')->create();

        $this->actingAs($user)
            ->post(route('report-templates.update', $reportTemplate), [
                'category' => 1,
            ])
            ->assertSessionHasErrors([
                'name' => 'The name field is required.',
            ]);
    }

    public function testCanUpdateAReportTemplate()
    {
        $user = User::factory()->canViewReports()->create();

        $reportTemplate = ReportTemplate::factory()->notShared()->for($user, 'creator')->create([
            'name' => 'Original Name',
            'options' => [
                'category' => 1,
                'by_category_id' => 2,
                'company' => 1,
                'by_company_id' => [1, 2],
            ],
        ]);

        $this->actingAs($user)
            ->post(route('report-templates.update', $reportTemplate), [
                'name' => 'Updated Name',
                'company' => 1,
                'by_company_id' => [3],
            ])
            ->assertRedirectToRoute('report-templates.show', $reportTemplate->id);

        $reportTemplate->refresh();
        $this->assertEquals(0, $reportTemplate->is_shared);
        $this->assertEquals('Updated Name', $reportTemplate->name);
        $this->assertEquals(0, $reportTemplate->checkmarkValue('category'));
        $this->assertEquals([], $reportTemplate->selectValues('by_category_id'));
        $this->assertEquals(1, $reportTemplate->checkmarkValue('company'));
        $this->assertEquals([3], $reportTemplate->selectValues('by_company_id'));
    }

    public function testCanUpdateAReportTemplateWithTheSameName()
    {
        $user = User::factory()->canViewReports()->create();

        $reportTemplate = ReportTemplate::factory()->notShared()->for($user, 'creator')->create([
            'name' => 'Original Name',
            'options' => [
                'category' => 1,
                'by_category_id' => 2,
                'company' => 1,
                'by_company_id' => [1, 2],
            ],
        ]);

        $this->actingAs($user)
            ->post(route('report-templates.update', $reportTemplate), [
                'name' => 'Original Name',
                'company' => 1,
                'by_company_id' => [3],
            ])
            ->assertSessionDoesntHaveErrors();
    }

    public function testCanShareAReportTemplate()
    {
        $user = User::factory()->canViewReports()->create();

        $reportTemplate = ReportTemplate::factory()->notShared()->for($user, 'creator')->create([
            'name' => 'Original Name',
            'options' => [
                'category' => 1,
                'by_category_id' => 2,
                'company' => 1,
            ],
        ]);

        $this->actingAs($user)
            ->post(route('report-templates.update', $reportTemplate), [
                'name' => 'Original Name',
                'options' => [
                    'category' => 1,
                    'by_category_id' => 2,
                    'company' => 1,
                ],
                'is_shared' => 1,
            ])
            ->assertRedirectToRoute('report-templates.show', $reportTemplate->id);

        $reportTemplate->refresh();
        $this->assertEquals(1, $reportTemplate->is_shared);
        $this->assertEquals('Original Name', $reportTemplate->name);

    }
}
