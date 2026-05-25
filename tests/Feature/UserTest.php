<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    private function loginAsAdmin()
    {
        $user = User::factory()->admin()->create();
        $this->actingAs($user);
        return $user;
    }

    private function loginAsCashier()
    {
        $user = User::factory()->cashier()->create();
        $this->actingAs($user);
        return $user;
    }

    /** @test */
    public function test_admin_can_create_new_user_include_assert_photo()
    {
        $this->loginAsAdmin();
        Storage::fake('public');

        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->post(route('users.store'), [
            'username' => 'kasirbaru',
            'fullname' => 'Kasir Andalan',
            'email' => 'kasir@example.com',
            'password' => 'password123',
            'role' => 'cashier',
            'photo' => $file
        ]);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', ['email' => 'kasir@example.com']);
        
        $this->assertNotEmpty(Storage::disk('public')->allFiles('photos'));
    }

    /** @test */
    public function test_cashier_cannot_edit_profile_others()
    {
        $cashier = $this->loginAsCashier(); 
        $targetUser = User::factory()->create(); 

        $response = $this->get(route('cashier.edit', $targetUser->id));

        $response->assertRedirect(route('orders.index'));
        $response->assertSessionHas('error');
    }

    /** @test */
    public function test_cashier_can_edit_own_profile()
    {
        $cashier = $this->loginAsCashier();

        $response = $this->get(route('cashier.edit', $cashier->id));

        $response->assertStatus(200);
        $response->assertViewIs('kasir.profile.edit');
    }

    /** @test */
    public function test_admin_can_edit_anyone()
    {
        $this->loginAsAdmin();
        $targetUser = User::factory()->create();

        $response = $this->get(route('users.edit', $targetUser->id));

        $response->assertStatus(200);
        $response->assertViewIs('users.edit');
    }

    /** @test */
    public function test_admin_cannot_delete_yourself()
    {
        $admin = $this->loginAsAdmin();

        $response = $this->delete(route('users.destroy', $admin->id));

        $response->assertSessionHas('error');
        $this->assertDatabaseHas('users', ['id' => $admin->id]); // Data masih ada
    }
}
