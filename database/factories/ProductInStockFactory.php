<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductInStockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::all()->random()->id,
            'size' => $this->faker->randomElement(['S', 'M', 'L']),
            'type' => $this->faker->randomElement(['boots','sneaker','sandal']),
            'color' => $this->faker->colorName(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'price' => $this->faker->randomFloat(2, 40000, 300000),
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
