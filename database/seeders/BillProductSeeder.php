<?php

namespace Database\Seeders;

use App\Models\BillProduct;
use Illuminate\Database\Seeder;

class BillProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BillProduct::unguard();
        BillProduct::factory(10)->create();
    }
}
