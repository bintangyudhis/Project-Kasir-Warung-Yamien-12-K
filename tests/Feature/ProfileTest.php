<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_user_can_update_profil()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->patch(route('profile.update'), [
            'username' => 'Nama Baru', 
            'fullname' => 'Nama Baru',
            'email' => 'baru@example.com',
        ]);

        $this->assertEquals('Nama Baru', $user->fresh()->fullname);
        $this->assertEquals('baru@example.com', $user->fresh()->email);
    }

    /** @test */
    public function test_email_verified_reset_when_email_change()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $this->actingAs($user);

        $this->patch(route('profile.update'), [
            'username' => $user->username,
            'fullname' => $user->fullname,
            'email' => 'ganti@example.com',
        ]);

        $this->assertNull($user->fresh()->email_verified_at);
    }

    /** @test */
    public function test_user_can_delete_account_when_password_input_is_correct()
    {
        $user = User::factory()->create(['password' => bcrypt('password123')]);
        $this->actingAs($user);

        $response = $this->delete(route('profile.destroy'), [
            'password' => 'password123', 
        ]);

        $response->assertRedirect('/');
        $this->assertModelMissing($user);
    }

    /** @test */
    public function test_user_failed_delete_account_when_password_input_is_incorrect()
    {
        $user = User::factory()->create(['password' => bcrypt('password123')]);
        $this->actingAs($user);

        $response = $this->delete(route('profile.destroy'), [
            'password' => 'salah123', 
        ]);

        $response->assertSessionHasErrorsIn('password');
        $this->assertModelExists($user); 
    }

}
