<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'amount' => fake()->numberBetween(50000, 500000),
            'payment_method' => fake()->randomElement(['midtrans', 'cash']),
            'status' => fake()->randomElement(['paid', 'unpaid']),
            'transaction_id' => fake()->uuid(), 
            'midtrans_transaction' => null,
            'payment_date' => fake()->date(),
        ];
    }
}
