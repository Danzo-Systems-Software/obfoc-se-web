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
        $reportType->delete();
        $response->assertStatus(302);
        $response->assertRedirect('/login');

    }

    public function testGuestUserHasNoAccessToReportTypesDestroy()
    {
        $reportType = reportType::factory()->create(['name' => 'test']);
        $response = $this->put(route('reportTypes.destroy', $reportType));
        $reportType->delete();
        $response->assertStatus(302);
        $response->assertRedirect('/login');

    }

    public function testUserHasNoAccessToReportTypesIndex()
    {
        $user = User::factory()->create(['role'=> UserRole::USER]);
        $response = $this->actingAs($user)->get(route('reportTypes.index'));
        $user->delete();
        $response->assertStatus(403);

    }

    public function testUserHasNoAccessToReportTypesCreate()
    {
        $user = User::factory()->create(['role'=> UserRole::USER]);
        $response = $this->actingAs($user)->get(route('reportTypes.create'));
        $user->delete();
        $response->assertStatus(403);

    }
    public function testUserHasNoAccessToReportTypesStore()
    {
        $user = User::factory()->create(['role'=> UserRole::USER]);
        $response = $this->actingAs($user)->post(route('reportTypes.store', 'testaaa'));
        $user->delete();
        $response->assertStatus(403);

    }

    public function testUserHasNoAccessToReportTypesEdit()
    {
        $user = User::factory()->create(['role'=> UserRole::USER]);
        $reportType = reportType::factory()->create(['name' => 'test']);
        $response = $this->actingAs($user)->get(route('reportTypes.edit', $reportType));
        $user->delete();
        $reportType->delete();
        $response->assertStatus(403);

    }

    public function testUserHasNoAccessToReportTypesDestroy()
    {
        $user = User::factory()->create(['role'=> UserRole::USER]);
        $reportType = reportType::factory()->create(['name' => 'test']);
        $response = $this->actingAs($user)->delete(route('reportTypes.destroy', $reportType));
        $user->delete();
        $reportType->delete();
        $response->assertStatus(403);

    }

    public function testAdminUserHasAccessToReportTypesIndex()
    {
        $user = User::factory()->create(['role'=> UserRole::ADMIN]);
        $response = $this->actingAs($user)->get(route('reportTypes.index'));
        $user->delete();
        $response->assertStatus(200);

    }

    public function testAdminUserHasAccessToReportTypesCreate()
    {
        $user = User::factory()->create(['role'=> UserRole::ADMIN]);
        $response = $this->actingAs($user)->get(route('reportTypes.create'));
        $user->delete();
        $response->assertStatus(200);

    }

    public function testAdminUserHasAccessToReportTypesStore()
    {
        $user = User::factory()->create(['role'=> UserRole::ADMIN]);
        $response = $this->actingAs($user)->post(route('reportTypes.store', 'testaaa'));
        $user->delete();
        $response->assertStatus(302);
        $response->assertRedirect('/');

    }

    public function testAdminUserHasAccessToReportTypesEdit()
    {
        $user = User::factory()->create(['role'=> UserRole::ADMIN]);
        $reportType = reportType::factory()->create(['name' => 'test']);
        $response = $this->actingAs($user)->get(route('reportTypes.edit', $reportType));
        $user->delete();
        $reportType->delete();
        $response->assertStatus(200);

    }

    public function testAdminUserHasAccessToReportTypesDestroy()
    {
        $user = User::factory()->create(['role'=> UserRole::ADMIN]);
        $reportType = reportType::factory()->create(['name' => 'test']);
        $response = $this->actingAs($user)->delete(route('reportTypes.destroy', $reportType));
        $user->delete();
        $reportType->delete();
        $response->assertStatus(302);

    }


}
