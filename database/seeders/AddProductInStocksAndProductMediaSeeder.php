<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddProductInStocksAndProductMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 22; $i++) {
            DB::table('product_in_stocks')->insert(
                [
                    [
                        'product_id' => $i,
                        'size' => '36',
                        'type' => 'low',
                        'color' => 'red',
                        'gender' => 'male',
                        'price' => 20,
                        'quantity' => 20,
                    ],
                    [
                        'product_id' => $i,
                        'size' => '37',
                        'type' => 'low',
                        'color' => 'red',
                        'gender' => 'male',
                        'price' => 20,
                        'quantity' => 10,
                    ],
                    [
                        'product_id' => $i,
                        'size' => '38',
                        'type' => 'low',
                        'color' => 'red',
                        'gender' => 'male',
                        'price' => 20,
                        'quantity' => 200,
                    ],
                    [
                        'product_id' => $i,
                        'size' => '39',
                        'type' => 'low',
                        'color' => 'red',
                        'gender' => 'male',
                        'price' => 20,
                        'quantity' => 11,
                    ],
                    [
                        'product_id' => $i,
                        'size' => '40',
                        'type' => 'low',
                        'color' => 'red',
                        'gender' => 'male',
                        'price' => 20,
                        'quantity' => 5,
                    ],
                    [
                        'product_id' => $i,
                        'size' => '41',
                        'type' => 'low',
                        'color' => 'red',
                        'gender' => 'male',
                        'price' => 20,
                        'quantity' => 6,
                    ],
                ]
            );
        }

        DB::table('product_media')->insert(
            [
                [
                    'product_id' => 1,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/1/0.jpg',
                ],
                [
                    'product_id' => 1,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/1/1.jpg',

                ],
                [
                    'product_id' => 1,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/1/2.jpg',
                ],
                [
                    'product_id' => 1,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/1/3.jpg',
                ],
                [
                    'product_id' => 6,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Converse/9999205501485_1_11.jpg',
                ],
                [
                    'product_id' => 6,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/18/0.jpg',
                ],
                [
                    'product_id' => 6,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/18/1.jpg',
                ],
                [
                    'product_id' => 6,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/18/2.jpg',
                ],
                [
                    'product_id' => 6,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/18/3.jpg',
                ],
                [
                    'product_id' => 7,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Adidas/9999204575340_1_8.jpg',
                ],
                [
                    'product_id' => 7,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/4/0.jpg',
                ],
                [
                    'product_id' => 7,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/4/1.jpg',
                ],
                [
                    'product_id' => 7,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/4/2.jpg',
                ],
                [
                    'product_id' => 7,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/4/3.jpg',
                ],
                [
                    'product_id' => 8,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Adidas/9999204576149_1_9.jpg',
                ],
                [
                    'product_id' => 8,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/5/0.jpg',
                ],
                [
                    'product_id' => 8,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/5/1.jpg',
                ],
                [
                    'product_id' => 8,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/5/2.jpg',
                ],
                [
                    'product_id' => 8,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/5/3.jpg',
                ],
                [
                    'product_id' => 9,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Adidas/9999204580658_1_9.jpg',
                ],
                [
                    'product_id' => 9,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/6/0.jpg',
                ],
                [
                    'product_id' => 9,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/6/1.jpg',
                ],
                [
                    'product_id' => 9,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/6/2.jpg',
                ],
                [
                    'product_id' => 9,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/6/3.jpg',
                ],
                [
                    'product_id' => 10,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Adidas/9999204580849_1_7.jpg',
                ],
                [
                    'product_id' => 10,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/7/0.jpg',
                ],
                [
                    'product_id' => 10,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/7/1.jpg',
                ],
                [
                    'product_id' => 10,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/7/2.jpg',
                ],
                [
                    'product_id' => 10,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/7/3.jpg',
                ],
                [
                    'product_id' => 11,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Adidas/9999204581600_1_6.jpg',
                ],
                [
                    'product_id' => 11,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/8/0.jpg',
                ],
                [
                    'product_id' => 11,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/8/1.jpg',
                ],
                [
                    'product_id' => 11,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/8/2.jpg',
                ],
                [
                    'product_id' => 11,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/8/3.jpg',
                ],
                [
                    'product_id' => 12,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Adidas/9999205467767_1_8.jpg',
                ],
                [
                    'product_id' => 12,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/9/0.jpg',
                ],
                [
                    'product_id' => 12,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/9/1.jpg',
                ],
                [
                    'product_id' => 12,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/9/2.jpg',
                ],
                [
                    'product_id' => 12,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/9/3.jpg',
                ],
                [
                    'product_id' => 13,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Adidas/9999207721225_1_9.jpg',
                ],
                [
                    'product_id' => 13,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/10/0.jpg',
                ],
                [
                    'product_id' => 13,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/10/1.jpg',
                ],
                [
                    'product_id' => 13,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/10/2.jpg',
                ],
                [
                    'product_id' => 13,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/10/3.jpg',
                ],
                [
                    'product_id' => 14,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Adidas Y-3/9999204019547_1_14.jpg',
                ],
                [
                    'product_id' => 14,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/11/0.jpg',
                ],
                [
                    'product_id' => 14,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/11/1.jpg',
                ],
                [
                    'product_id' => 14,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/11/2.jpg',
                ],
                [
                    'product_id' => 14,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/11/3.jpg',
                ],
                [
                    'product_id' => 15,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Adidas Y-3/9999204021557_1_15.jpg',
                ],
                [
                    'product_id' => 15,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/12/0.jpg',
                ],
                [
                    'product_id' => 15,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/12/1.jpg',
                ],
                [
                    'product_id' => 15,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/12/2.jpg',
                ],
                [
                    'product_id' => 15,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/12/3.jpg',
                ],
                [
                    'product_id' => 16,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Adidas Y-3/9999205466531_1_8.jpg',
                ],
                [
                    'product_id' => 16,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/13/0.jpg',
                ],
                [
                    'product_id' => 16,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/13/1.jpg',
                ],
                [
                    'product_id' => 16,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/13/2.jpg',
                ],
                [
                    'product_id' => 16,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/13/3.jpg',
                ],
                [
                    'product_id' => 17,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Adidas Y-3/9999205628847_1_1_16.jpg',
                ],
                [
                    'product_id' => 17,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/14/0.jpg',
                ],
                [
                    'product_id' => 17,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/14/1.jpg',
                ],
                [
                    'product_id' => 17,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/14/2.jpg',
                ],
                [
                    'product_id' => 17,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/14/3.jpg',
                ],
                [
                    'product_id' => 18,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Converse/9999202424640_1_5.jpg',
                ],
                [
                    'product_id' => 18,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/20/0.jpg',
                ],
                [
                    'product_id' => 18,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/20/1.jpg',
                ],
                [
                    'product_id' => 18,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/20/2.jpg',
                ],
                [
                    'product_id' => 18,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/20/3.jpg',
                ],
                [
                    'product_id' => 19,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Converse/9999202424961_1_8.jpg',
                ],
                [
                    'product_id' => 19,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/21/0.jpg',
                ],
                [
                    'product_id' => 19,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/21/1.jpg',
                ],
                [
                    'product_id' => 19,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/21/2.jpg',
                ],
                [
                    'product_id' => 19,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/21/3.jpg',
                ],
                [
                    'product_id' => 20,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Converse/9999202425227_1_7.jpg',
                ],
                [
                    'product_id' => 20,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/22/0.jpg',
                ],
                [
                    'product_id' => 20,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/22/1.jpg',
                ],
                [
                    'product_id' => 20,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/22/2.jpg',
                ],
                [
                    'product_id' => 20,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/22/3.jpg',
                ],
                [
                    'product_id' => 21,
                    'type' => 'big image',
                    'media_link' => 'storage/images/Converse/9999203321788_1_8.jpg',
                ],
                [
                    'product_id' => 21,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/23/0.jpg',
                ],
                [
                    'product_id' => 21,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/23/1.jpg',
                ],
                [
                    'product_id' => 21,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/23/2.jpg',
                ],
                [
                    'product_id' => 21,
                    'type' => 'small image',
                    'media_link' => 'storage/images/ImageDetails/23/3.jpg',
                ],
            ]
        );
    }
}
