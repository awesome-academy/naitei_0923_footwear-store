<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->numberBetween(30, 70),
            'use_condition' => $this->faker->numberBetween(50000, 300000),
            'receive_condition' => $this->faker->numberBetween(100000, 500000),
            'duration' => $this->faker->numberBetween(1, 12),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'deleted_at' => null,
        ];
    }
}
