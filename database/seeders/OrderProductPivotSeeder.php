<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\SeedersConstants as SC;

class OrderProductPivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        for($i = 1; $i<SC::ORDERS_COUNT; ++$i) {
            for($j = 0; $j < rand(1, 5); ++$j) {
                $data[] = [
                    'order_id' => $i,
                    'product_id' => rand(1, Product::count()),
                ];
            }
        }

        DB::table('order_product')->insert($data);
    }
}
