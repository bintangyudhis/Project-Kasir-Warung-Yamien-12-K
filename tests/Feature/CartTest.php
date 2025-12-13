<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    private function loginAsCashier()
    {
        $user = User::factory()->create(['role' => 'cashier']);
        $this->actingAs($user);
        return $user;
    }

    /** @test */
    public function test_add_product_to_cart_user()
    {
        $this->loginAsCashier();
        $product = Product::factory()->create([
            'stock_quantity' => 10,
            'price' => 50000
        ]);

        $response = $this->post(route('cart.add', $product->id));

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $cart = session('cart');
        $this->assertArrayHasKey($product->id, $cart);
        $this->assertEquals(1, $cart[$product->id]['quantity']);
        $this->assertEquals(50000, $cart[$product->id]['price']);
    }

    /** @test */
    public function test_cannot_add_product_to_cart_if_stock_run_out()
    {
        $this->loginAsCashier();
        $product = Product::factory()->create(['stock_quantity' => 1]);

        session()->put('cart', [
            $product->id => [
                'quantity' => 1,
                'name' => $product->name,
                'price' => $product->price,
                'photo' => $product->photo
            ]
        ]);

        $response = $this->post(route('cart.add', $product->id));
        $response->assertSessionHas('error');
        
        $cart = session('cart');
        $this->assertEquals(1, $cart[$product->id]['quantity']);
    }

    /** @test */
    public function test_user_can_update_cart_quantity()
    {
        $this->loginAsCashier();
        $product = Product::factory()->create(['stock_quantity' => 10]);

        session()->put('cart', [
            $product->id => [
                'quantity' => 1,
                'name' => $product->name,
                'price' => $product->price,
                'photo' => $product->photo
            ]
        ]);

        $response = $this->patch(route('cart.update', $product->id), [
            'quantity' => 5
        ]);

        $response->assertSessionHas('success');
        $this->assertEquals(5, session('cart')[$product->id]['quantity']);
    }

    /** @test */
    public function test_user_can_delete_item_from_cart()
    {
        $this->loginAsCashier();
        $product = Product::factory()->create();

        session()->put('cart', [
            $product->id => [
                'quantity' => 1,
                'name' => $product->name,
                'price' => $product->price,
                'photo' => $product->photo
            ]
        ]);

        $response = $this->delete(route('cart.remove', $product->id));

        $response->assertSessionHas('success');
        $this->assertEmpty(session('cart'));
    }

}
