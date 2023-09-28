<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateProductMediaSeeder extends Seeder
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
                    'product_id' => 2,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/2/0.jpg',
                ],
                [
                    'product_id' => 2,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/2/1.jpg',

                ],
                [
                    'product_id' => 2,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/2/2.jpg',
                ],
                [
                    'product_id' => 2,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/2/3.jpg',
                ],
                [
                    'product_id' => 3,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/3/0.jpg',
                ],
                [
                    'product_id' => 3,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/3/1.jpg',
                ],
                [
                    'product_id' => 3,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/3/2.jpg',
                ],
                [
                    'product_id' => 3,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/3/3.jpg',
                ],
            ]
        );
        
    }
}
