<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\SeedersConstants as SC;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $modes = ['card', 'cash'];
        return [
            'executed_at' => $this->faker->dateTime('now', null),
            'status' => rand(1,3),
            'mode' => $modes[rand(0, 1)],
            'order_id' => rand(1, SC::ORDERS_COUNT),
        ];
    }
}
