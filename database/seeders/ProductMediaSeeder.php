<?php

namespace Database\Seeders;

use App\Models\ProductMedia;
use Illuminate\Database\Seeder;

class ProductMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductMedia::unguard();
        ProductMedia::factory(15)->create();
    }
}
