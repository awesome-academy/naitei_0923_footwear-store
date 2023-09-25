<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bill_products')->insert(
            [
                [
                    'bill_id' => 3,
                    'product_in_stocks_id' => 1,
                    'price' => 150,
                    'quantity' => 3,
                ],
                [
                    'bill_id' => 3,
                    'product_in_stocks_id' => 2,
                    'price' => 50,
                    'quantity' => 2,
                ],
            ]
        );
    }
}
