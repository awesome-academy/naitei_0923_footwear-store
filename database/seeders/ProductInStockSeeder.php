<?php

namespace Database\Seeders;

use App\Models\ProductInStock;
use Illuminate\Database\Seeder;

class ProductInStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductInStock::unguard();
        ProductInStock::factory(20)->create();
    }
}
