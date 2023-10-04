<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Adidas Y-7',
                    'brand' => 'Adidas',
                ],
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Adidas Y-8',
                    'brand' => 'Adidas',
                ],
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Adidas All Star',
                    'brand' => 'Adidas',
                ],
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Adidas Yeezy',
                    'brand' => 'Adidas',
                ],
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Adidas Polarbear',
                    'brand' => 'Adidas',
                ],
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Adidas Neo 3',
                    'brand' => 'Adidas',
                ],
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Adidas Neo',
                    'brand' => 'Adidas',
                ],
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Adidas Y-3 Runner 4D',
                    'brand' => 'Adidas',
                ],
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Adidas Y-3 Qasa',
                    'brand' => 'Adidas',
                ],
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Adidas Y-3 Pure Boost',
                    'brand' => 'Adidas',
                ],
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Adidas Y-3 Yohji Star',
                    'brand' => 'Adidas',
                ],
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Nike Air Force 1',
                    'brand' => 'Nike',
                ],
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Nike Air Trainer SC',
                    'brand' => 'Nike',
                ],
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Nike Air Max 90',
                    'brand' => 'Nike',
                ],
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Nike Air Max 95',
                    'brand' => 'Nike',
                ],
            ]
        );
    }
}
