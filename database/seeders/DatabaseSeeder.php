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
            CreateInitialAdminAccount::class,
            ProductSeeder::class,
            ProductMediaSeeder::class,
            ProductInStockSeeder::class,
            AddProductMediaSeeder::class,
            BillSeeder::class,
            BillProductSeeder::class,
            UpdateProductMediaSeeder::class,
        ]);
    }
}
