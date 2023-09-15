<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_media')->insert(
            [
                [
                    'product_id' => 1,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Adidas/9999202991449_1_8.jpg',
                ],
                [
                    'product_id' => 2,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Adidas/9999202991449_1_8.jpg',

                ],
                [
                    'product_id' => 3,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Adidas/9999202991449_1_8.jpg',
                ],
                [
                    'product_id' => 4,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Comme des Garcons/9999203874680_1.jpg',
                ],
                [
                    'product_id' => 5,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Comme des Garcons/9999203874970_1.jpg',
                ],
            ]
        );
    }
}
