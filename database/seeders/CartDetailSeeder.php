<?php

namespace Database\Seeders;

use App\Models\CartDetail;
use Illuminate\Database\Seeder;

class CartDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CartDetail::unguard();
        CartDetail::factory(10)->create();
    }
}
