<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
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
                    'name' => 'Adidas Y-3',
                    'brand' => 'Adidas',
                ],
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Adidas Y-4',
                    'brand' => 'Adidas',
                ],
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Adidas Y-5',
                    'brand' => 'Adidas',
                ],
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Adidas Y-6',
                    'brand' => 'Adidas',
                ],
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Comme des Garcons',
                    'brand' => 'Comme des Garcons',
                ],
                [
                    'product_uuid' => Str::random(7),
                    'name' => 'Adidas Boost',
                    'brand' => 'Comme des Garcons',
                ],
            ]
        );
    }
}
