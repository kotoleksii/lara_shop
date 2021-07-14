<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence(rand(3, 10)),
            'price' => $this->faker->numberBetween(10000, 2000000),
            'qty' => $this->faker->randomDigit(),
            'sub_category_id' => rand(1, SubCategory::count()),
        ];
    }
}
