<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            ProductMediaSeeder::class,
            ProductInStockSeeder::class,
            VoucherSeeder::class,
            ReviewSeeder::class,
            CartDetailSeeder::class,
            BillSeeder::class,
            BillProductSeeder::class,
        ]);
    }
}
