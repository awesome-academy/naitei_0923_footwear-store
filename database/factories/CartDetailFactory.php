<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\ProductInStock;

class CartDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'product_in_stocks_id' => ProductInStock::all()->random()->id,
            'quantity' => $this->faker->numberBetween(1, 3),
        ];
    }
}
