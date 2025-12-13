<?php

namespace Tests\Feature;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActivityLogTest extends TestCase
{
    use RefreshDatabase;
    private function loginAsAdmin()
    {
        $this->actingAs(User::factory()->admin()->create());
    }

    protected function setUp(): void
    {
        parent::setUp();
        $user = User::factory()->create();
        ActivityLog::create([
            'user_id' => $user->id,
            'activity_type' => 'login',
            'description' => 'User login testing'
        ]);
    }

    /** @test */
    public function test_admin_can_visit_activity_log_page()
    {
        $this->loginAsAdmin();

        $response = $this->get(route('activity-logs.index'));

        $response->assertStatus(200);
        $response->assertViewIs('activity-logs.index');
        $response->assertSee('User login testing');
    }

    /** @test */
    public function test_can_export_pdf()
    {
        $this->loginAsAdmin();

        $response = $this->get(route('activity-logs.export-pdf'));

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/pdf');
    }

    /** @test */
    public function test_can_export_excel()
    {
        $this->loginAsAdmin();

        $response = $this->get(route('activity-logs.export-excel'));

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'text/csv; charset=UTF-8');
        $response->assertHeader('content-disposition', 'attachment; filename="activity-log-' . date('Y-m-d') . '.csv"');
    }
}
