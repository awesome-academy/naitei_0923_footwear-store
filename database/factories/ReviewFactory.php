<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->realText(),
            'point' => $this->faker->randomDigit(),
            'user_id' => User::all()->random()->id,
            'product_id' => Product::all()->random()->id,
        ];
    }
}
