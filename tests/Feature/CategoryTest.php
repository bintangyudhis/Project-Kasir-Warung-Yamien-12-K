<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    private function loginAsAdmin()
    {
        $this->actingAs(User::factory()->admin()->create());
    }

    /** @test */
    public function test_admin_can_adding_category()
    {
        $this->loginAsAdmin();

        $response = $this->post(route('categories.store'), [
            'name' => 'Minuman'
        ]);

        $response->assertRedirect(route('categories.index'));
        $this->assertDatabaseHas('categories', ['name' => 'Minuman']);
    }

    /** @test */
    public function test_cannot_adding_category_with_same_name()
    {
        $this->loginAsAdmin();
        
        Category::factory()->create(['name' => 'Makanan']);

        $response = $this->post(route('categories.store'), [
            'name' => 'Makanan'
        ]);

        $response->assertSessionHasErrors('name');
    }

    
}
