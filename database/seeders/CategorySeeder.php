<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Enums\SeedersConstants as SC;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(SC::CATEGORIES_COUNT)->create();
    }
}
