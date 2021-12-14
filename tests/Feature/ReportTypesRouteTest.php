<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\reportType;
use App\Enums\UserRole;
class ReportTypesRouteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGuestUserHasNoAccessToReportTypesIndex()
    {
        $response = $this->get('/reportTypes');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function testGuestUserHasNoAccessToReportTypesCreate()
    {
        $response = $this->get(route('reportTypes.create'));

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function testGuestUserHasNoAccessToReportTypesStore()
    {
        $response = $this->post(route('reportTypes.store'), ['name' => 'test']);
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function testGuestUserHasNoAccessToReportTypesEdit()
    {
        $reportType = reportType::factory()->create(['name' => 'test']);
        $response = $this->get(route('reportTypes.edit', $reportType->id));
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        $reportType->delete();
    }

    public function testGuestUserHasNoAccessToReportTypesDestroy()
    {
        $reportType = reportType::factory()->create(['name' => 'test']);
        $response = $this->put(route('reportTypes.destroy', $reportType));
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        $reportType->delete();
    }

    public function testUserHasNoAccessToReportTypesIndex()
    {
        $user = User::factory()->create(['role'=> UserRole::USER]);
        $response = $this->actingAs($user)->get(route('reportTypes.index'));

        $response->assertStatus(403);
        $user->delete();
    }

    public function testUserHasNoAccessToReportTypesCreate()
    {
        $user = User::factory()->create(['role'=> UserRole::USER]);
        $response = $this->actingAs($user)->get(route('reportTypes.create'));

        $response->assertStatus(403);
        $user->delete();
    }
    public function testUserHasNoAccessToReportTypesStore()
    {
        $user = User::factory()->create(['role'=> UserRole::USER]);
        $response = $this->actingAs($user)->post(route('reportTypes.store', 'testaaa'));

        $response->assertStatus(403);
        $user->delete();
    }

    public function testUserHasNoAccessToReportTypesEdit()
    {
        $user = User::factory()->create(['role'=> UserRole::USER]);
        $reportType = reportType::factory()->create(['name' => 'test']);
        $response = $this->actingAs($user)->get(route('reportTypes.edit', $reportType));
        $response->assertStatus(403);
        $user->delete();
        $reportType->delete();
    }

    public function testUserHasNoAccessToReportTypesDestroy()
    {
        $user = User::factory()->create(['role'=> UserRole::USER]);
        $reportType = reportType::factory()->create(['name' => 'test']);
        $response = $this->actingAs($user)->delete(route('reportTypes.destroy', $reportType));
        $response->assertStatus(403);
        $user->delete();
        $reportType->delete();
    }

    public function testAdminUserHasAccessToReportTypesIndex()
    {
        $user = User::factory()->create(['role'=> UserRole::ADMIN]);
        $response = $this->actingAs($user)->get(route('reportTypes.index'));

        $response->assertStatus(200);
        $user->delete();
    }

    public function testAdminUserHasAccessToReportTypesCreate()
    {
        $user = User::factory()->create(['role'=> UserRole::ADMIN]);
        $response = $this->actingAs($user)->get(route('reportTypes.create'));

        $response->assertStatus(200);
        $user->delete();
    }

    public function testAdminUserHasAccessToReportTypesStore()
    {
        $user = User::factory()->create(['role'=> UserRole::ADMIN]);
        $response = $this->actingAs($user)->post(route('reportTypes.store', 'testaaa'));

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $user->delete();
    }

    public function testAdminUserHasAccessToReportTypesEdit()
    {
        $user = User::factory()->create(['role'=> UserRole::ADMIN]);
        $reportType = reportType::factory()->create(['name' => 'test']);
        $response = $this->actingAs($user)->get(route('reportTypes.edit', $reportType));
        $response->assertStatus(200);
        $user->delete();
        $reportType->delete();
    }

    public function testAdminUserHasAccessToReportTypesDestroy()
    {
        $user = User::factory()->create(['role'=> UserRole::ADMIN]);
        $reportType = reportType::factory()->create(['name' => 'test']);
        $response = $this->actingAs($user)->delete(route('reportTypes.destroy', $reportType));
        $response->assertStatus(302);
        $user->delete();
        $reportType->delete();
    }


}
