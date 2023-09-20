<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddProductMediaSeeder extends Seeder
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
                    'product_id' => 4,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/16/0.jpg',
                ],
                [
                    'product_id' => 4,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/16/1.jpg',

                ],
                [
                    'product_id' => 4,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/16/2.jpg',
                ],
                [
                    'product_id' => 4,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/16/3.jpg',
                ],
                [
                    'product_id' => 5,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/15/0.jpg',
                ],
                [
                    'product_id' => 5,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/15/1.jpg',
                ],
                [
                    'product_id' => 5,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/15/2.jpg',
                ],
                [
                    'product_id' => 5,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/15/3.jpg',
                ],
            ]
        );
    }
}
