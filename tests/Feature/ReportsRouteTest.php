<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Report;
use App\Enums\UserRole;
use App\Models\reportType;
class ReportsRouteTest extends TestCase
{
    public function testGuestUserHasNoAccessToReportsIndex()
    {
        $response = $this->get('/reports');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function testGuestUserHasNoAccessToReportsCreate()
    {
        $response = $this->get(route('reports.create'));

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function testGuestUserHasNoAccessToReportsStore()
    {
        $response = $this->post(route('reports.store'), ['name' => 'test']);
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function testGuestUserHasNoAccessToReportsShow()
    {
        $user = User::factory()->create(['role'=> UserRole::USER]);
        $user2 = User::factory()->create(['role'=> UserRole::USER]);
        $reportType = reportType::factory()->create(['name' => 'test']);
        $report = Report::factory()->create(['reporterID' => $user->id, 'reportTypeID' => $reportType->id, 'focusesOnUser' => $user2->id]);
        $response = $this->get(route('reports.show', $report->id));
        $report->delete();
        $reportType->delete();
        $user->delete();
        $user2->delete();
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
    public function testGuestUserHasNoAccessToReportsEdit()
    {
        $reportType = reportType::factory()->create(['name' => 'test']);
        $user = User::factory()->create(['role'=> UserRole::USER]);
        $user2 = User::factory()->create(['role'=> UserRole::USER]);
        $report = Report::factory()->create(['reporterID' => $user->id, 'reportTypeID' => $reportType->id, 'focusesOnUser' => $user2->id]);
        $response = $this->get(route('reports.edit', $report->id));
        $report->delete();
        $reportType->delete();
        $user->delete();
        $user2->delete();
        $response->assertStatus(302);
        $response->assertRedirect('/login');

    }

    public function testGuestUserHasNoAccessToReportsDestroy()
    {
        $reportType = reportType::factory()->create(['name' => 'test']);
        $user = User::factory()->create(['role'=> UserRole::USER]);
        $user2 = User::factory()->create(['role'=> UserRole::USER]);
        $report = Report::factory()->create(['reporterID' => $user->id, 'reportTypeID' => $reportType->id, 'focusesOnUser' => $user2->id]);
        $response = $this->put(route('reports.destroy', $report));
        $report->delete();
        $reportType->delete();
        $user->delete();
        $user2->delete();
        $response->assertStatus(302);
        $response->assertRedirect('/login');

    }

    public function testUserHasNoAccessToReportsIndex()
    {
        $user = User::factory()->create(['role'=> UserRole::USER]);
        $response = $this->actingAs($user)->get(route('reports.index'));
        $user->delete();
        $response->assertStatus(403);

    }

    public function testUserHasAccessToReportsCreate()
    {
        $user = User::factory()->create(['role'=> UserRole::USER]);
        $response = $this->actingAs($user)->get(route('reports.create'));
        $user->delete();
        $response->assertStatus(200);

    }
    public function testUserHasAccessToReportsStore()
    {
        $user = User::factory()->create(['role'=> UserRole::USER]);
        $user2 = User::factory()->create(['role'=> UserRole::USER]);
        $reportType = reportType::factory()->create(['name' => 'test']);
        $report = Report::factory()->create(['reporterID' => $user->id, 'reportTypeID' => $reportType->id, 'focusesOnUser' => $user2->id]);
        $response = $this->actingAs($user)->post(route('reports.store', ['reporterID' => $report->reporterID, 'reportTypeID' => $report->reportTypeID, 'addedOn' => $report->addedOn, 'reportContent' => $report->reportContent, 'focusesOnUser' => $report->focusesOnUser, 'isOpenned' => $report->isOpenned]));
        $report->delete();
        $reportType->delete();
        $user->delete();
        $user2->delete();
        $response->assertStatus(302);
        $response->assertRedirect('/');

    }

    public function testUserHasAccessToReportsShow()
    {
        $user = User::factory()->create(['role'=> UserRole::USER]);
        $user2 = User::factory()->create(['role'=> UserRole::USER]);
        $reportType = reportType::factory()->create(['name' => 'test']);
        $report = Report::factory()->create(['reporterID' => $user->id, 'reportTypeID' => $reportType->id, 'focusesOnUser' => $user2->id]);
        $response = $this->actingAs($user)->get(route('reports.show', $report));
        $report->delete();
        $reportType->delete();
        $user->delete();
        $user2->delete();
        $response->assertStatus(200);

    }

    public function testUserHasNoAccessToReportsEdit()
    {
        $user = User::factory()->create(['role'=> UserRole::USER]);
        $user2 = User::factory()->create(['role'=> UserRole::USER]);
        $reportType = reportType::factory()->create(['name' => 'test']);
        $report = Report::factory()->create(['reporterID' => $user->id, 'reportTypeID' => $reportType->id, 'focusesOnUser' => $user2->id]);
        $response = $this->actingAs($user)->get(route('reports.edit', $report));
        $report->delete();
        $reportType->delete();
        $user->delete();
        $user2->delete();
        $response->assertStatus(403);

    }

    public function testUserHasNoAccessToReportsDestroy()
    {
        $user = User::factory()->create(['role'=> UserRole::USER]);
        $reportType = reportType::factory()->create(['name' => 'test']);
        $user2 = User::factory()->create(['role'=> UserRole::USER]);
        $report = Report::factory()->create(['reporterID' => $user->id, 'reportTypeID' => $reportType->id, 'focusesOnUser' => $user2->id]);
        $response = $this->actingAs($user)->delete(route('reports.destroy', $report));
        $report->delete();

        $reportType->delete();
        $user2->delete();
        $user->delete();
        $response->assertStatus(403);

    }

    public function testAdminUserHasAccessToReportsIndex()
    {
        $user = User::factory()->create(['role'=> UserRole::ADMIN]);
        $response = $this->actingAs($user)->get(route('reports.index'));
        $user->delete();
        $response->assertStatus(200);

    }

    public function testAdminUserHasAccessToReportsCreate()
    {
        $user = User::factory()->create(['role'=> UserRole::ADMIN]);
        $response = $this->actingAs($user)->get(route('reports.create'));
        $user->delete();
        $response->assertStatus(200);

    }

    public function testAdminUserHasAccessToReportsStore()
    {
        $user = User::factory()->create(['role'=> UserRole::ADMIN]);
        $user2 = User::factory()->create(['role'=> UserRole::USER]);
        $reportType = reportType::factory()->create(['name' => 'test']);
        $report = Report::factory()->create(['reporterID' => $user->id, 'reportTypeID' => $reportType->id, 'focusesOnUser' => $user2->id]);
        $response = $this->actingAs($user)->post(route('reports.store', ['reporterID' => $report->reporterID, 'reportTypeID' => $report->reportTypeID, 'addedOn' => $report->addedOn, 'reportContent' => $report->reportContent, 'focusesOnUser' => $report->focusesOnUser, 'isOpenned' => $report->isOpenned]));
        $report->delete();
        $reportType->delete();
        $user->delete();
        $user2->delete();
        $response->assertStatus(302);
        $response->assertRedirect('/');

    }

    public function testAdminUserHasAccessToReportsShow()
    {
        $user = User::factory()->create(['role'=> UserRole::ADMIN]);
        $user2 = User::factory()->create(['role'=> UserRole::USER]);
        $reportType = reportType::factory()->create(['name' => 'test']);
        $report = Report::factory()->create(['reporterID' => $user->id, 'reportTypeID' => $reportType->id, 'focusesOnUser' => $user2->id]);
        $response = $this->actingAs($user)->get(route('reports.show', $report));
        $report->delete();
        $reportType->delete();
        $user->delete();
        $user2->delete();
        $response->assertStatus(200);
    }

    public function testAdminUserHasAccessToReportsEdit()
    {
        $user = User::factory()->create(['role'=> UserRole::ADMIN]);
        $user2 = User::factory()->create(['role'=> UserRole::USER]);
        $reportType = reportType::factory()->create(['name' => 'test']);
        $report = Report::factory()->create(['reporterID' => $user->id, 'reportTypeID' => $reportType->id, 'focusesOnUser' => $user2->id]);
        $response = $this->actingAs($user)->get(route('reports.edit', $report));
        $report->delete();
        $reportType->delete();
        $user->delete();
        $response->assertStatus(200);

    }

    public function testAdminUserHasAccessToReportsDestroy()
    {
        $user = User::factory()->create(['role'=> UserRole::ADMIN]);
        $user2 = User::factory()->create(['role'=> UserRole::USER]);
        $reportType = reportType::factory()->create(['name' => 'test']);
        $report = Report::factory()->create(['reporterID' => $user->id, 'reportTypeID' => $reportType->id, 'focusesOnUser' => $user2->id]);
        $response = $this->actingAs($user)->delete(route('reports.destroy', $report));
        $user->delete();
        $user2->delete();
        $reportType->delete();
        $report->delete();
        $response->assertStatus(302);

    }
}

?>
