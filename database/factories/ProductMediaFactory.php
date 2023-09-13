<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductMediaFactory extends Factory
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
            'type' => $this->faker->randomElement(['Image', 'Video']),
            'media_link' => $this->faker->imageUrl(640, 480),
        ];
    }
}
