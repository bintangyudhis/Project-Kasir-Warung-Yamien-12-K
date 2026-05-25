<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), 
            'booking_id' => null, 
            'customer_name' => fake()->name(),
            'total_amount' => fake()->numberBetween(50000, 500000),
            'order_date' => fake()->date(),
        ];
    }
}
