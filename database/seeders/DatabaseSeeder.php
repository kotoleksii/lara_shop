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
            UserSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
            OrderProductPivotSeeder::class,
            TransactionSeeder::class,

            PermissionsSeeder::class,
            RolesSeeder::class,
            TablesRelationsSeeder::class,
        ]);
    }
}
