<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => $this->faker->numberBetween(0, 3),
            'total_sum' => $this->faker->numberBetween(10000, 2000000),
            'delivery_sum' => $this->faker->numberBetween(0, 20000),
            'user_id' => rand(1, User::count()),
        ];
    }
}
