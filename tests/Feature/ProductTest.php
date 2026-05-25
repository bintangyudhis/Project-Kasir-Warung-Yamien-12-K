<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductTest extends TestCase
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
    public function test_admin_can_create_product_iclude_photo()
    {
        $this->loginAsAdmin();
        Storage::fake('public'); 
        
        $category = Category::factory()->create();
        $file = UploadedFile::fake()->image('ayam.jpg');

        $response = $this->post(route('products.store'), [
            'name' => 'Ayam Bakar',
            'category_id' => $category->id,
            'price' => 25000,
            'stock_quantity' => 100,
            'description' => 'Enak banget',
            'photo' => $file,
        ]);

        $response->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [
            'name' => 'Ayam Bakar',
            'price' => 25000
        ]);

        $this->assertNotEmpty(Storage::disk('public')->allFiles('products'));
    }

    /** @test */
    public function test_cashier_cant_access_pages_create_product()
    {
        $this->loginAsCashier();

        $response = $this->get(route('products.create'));

        $response->assertStatus(403); 
    }

    /** @test */
    public function test_admin_can_update_product()
    {
        $this->loginAsAdmin();
        $product = Product::factory()->create();

        $response = $this->put(route('products.update', $product->id), [
            'name' => 'Nama Baru',
            'category_id' => $product->category_id,
            'price' => 50000,
            'stock_quantity' => 10,
        ]);

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseHas('products', ['name' => 'Nama Baru']);
    }

    /** @test */
    public function test_admin_can_delete_product()
    {
        $this->loginAsAdmin();
        $product = Product::factory()->create();

        $response = $this->delete(route('products.destroy', $product->id));

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
