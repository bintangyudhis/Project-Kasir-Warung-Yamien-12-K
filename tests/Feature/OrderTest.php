<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Config::set('services.midtrans.serverKey', 'dummy-server-key');
    }

    private function loginAsCashier()
    {
        $user = User::factory()->create(['role' => 'cashier']);
        $this->actingAs($user);
        return $user;
    }

    /** @test */
    public function test_user_can_checkout_with_cash_and_reduce_stock()
    {
        $user = $this->loginAsCashier();

        $product = Product::factory()->create([
            'stock_quantity' => 10,
            'price' => 10000
        ]);

        session()->put('cart', [
            $product->id => [
                'name' => $product->name,
                'quantity' => 2, 
                'price' => $product->price,
                'photo' => null
            ]
        ]);

        $response = $this->post(route('orders.store'), [
            'customer_name' => 'Dafa Test',
            'order_date' => now()->format('Y-m-d'),
            'payment_method' => 'cash',
            'table_id' => null 
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('orders', [
            'customer_name' => 'Dafa Test',
            'total_amount' => 20000, 
        ]);

        $this->assertDatabaseHas('payments', [
            'amount' => 20000,
            'status' => 'paid', 
            'payment_method' => 'cash'
        ]);

        $this->assertEquals(8, $product->fresh()->stock_quantity);
        $this->assertEmpty(session('cart'));
    }

    /** @test */
    public function test_cant_checkout_when_cart_is_empty()
    {
        $this->loginAsCashier();

        $response = $this->post(route('orders.store'), [
            'customer_name' => 'Kosong',
            'order_date' => now()->format('Y-m-d'),
            'payment_method' => 'cash',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('error');
        $this->assertDatabaseCount('orders', 0);
    }

    /** @test */
    public function test_midtrans_callback_succes_update_status_paid()
    {
        $order = Order::factory()->create();
        $payment = Payment::factory()->create([
            'order_id' => $order->id,
            'transaction_id' => 'TRX-12345', // ID unik
            'status' => 'unpaid',
            'amount' => 100000
        ]);
        
        $serverKey = config('services.midtrans.serverKey');
        $grossAmount = '100000.00';

        $signatureKey = hash('sha512', 'TRX-12345' . '200' . $grossAmount . $serverKey);
        $payload = [
                    'order_id' => 'TRX-12345',
                    'status_code' => '200',
                    'gross_amount' => $grossAmount,
                    'signature_key' => $signatureKey,
                    'transaction_status' => 'settlement',
                ];
        
        $response = $this->postJson(route('midtrans.callback'), $payload);
        $response->assertStatus(200);

        $this->assertEquals('paid', $payment->fresh()->status);
        $this->assertNotNull($payment->fresh()->payment_date);
    }

    /** @test */
    public function test_midtrans_callback_rejected_when_signature_key_false()
    {
        $response = $this->postJson(route('midtrans.callback'), [
            'order_id' => 'TRX-PALSU',
            'signature_key' => 'false', 
            'transaction_status' => 'settlement'
        ]);

        $response->assertStatus(400);
    }

}
