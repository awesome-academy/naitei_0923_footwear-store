<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductInStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_in_stocks')->insert(
            [
                [
                    'product_id' => 1,
                    'size' => '44',
                    'type' => 'low',
                    'color' => 'red',
                    'gender' => 'male',
                    'price' => 20,
                    'quantity' => 200,
                ],
                [
                    'product_id' => 2,
                    'size' => '44',
                    'type' => 'low',
                    'color' => 'red',
                    'gender' => 'male',
                    'price' => 20,
                    'quantity' => 200,
                ],
                [
                    'product_id' => 3,
                    'size' => '44',
                    'type' => 'low',
                    'color' => 'red',
                    'gender' => 'male',
                    'price' => 20,
                    'quantity' => 200,
                ],
                [
                    'product_id' => 4,
                    'size' => '44',
                    'type' => 'low',
                    'color' => 'red',
                    'gender' => 'male',
                    'price' => 20,
                    'quantity' => 200,
                ],
                [
                    'product_id' => 5,
                    'size' => '44',
                    'type' => 'low',
                    'color' => 'red',
                    'gender' => 'male',
                    'price' => 20,
                    'quantity' => 200,
                ],
                [
                    'product_id' => 6,
                    'size' => '44',
                    'type' => 'low',
                    'color' => 'red',
                    'gender' => 'male',
                    'price' => 20,
                    'quantity' => 200,
                ],
            ]
        );
    }
}
