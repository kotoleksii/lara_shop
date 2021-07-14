<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use App\Enums\SeedersConstants as SC;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::factory(SC::SUB_CATEGORIES_COUNT)->create();
    }
}
