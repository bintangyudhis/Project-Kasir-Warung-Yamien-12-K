<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(), 
            'name' => fake()->words(3, true),
            'photo' => null,
            'description' => fake()->sentence(),
            'price' => fake()->numberBetween(10000, 100000), 
            'stock_quantity' => fake()->numberBetween(10, 100),
        ];
    }
}
