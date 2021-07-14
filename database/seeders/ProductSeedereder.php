<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Enums\SeedersConstants as SC;

class ProductSeedereder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(SC::PRODUCTS_COUNT)->create();
    }
}
