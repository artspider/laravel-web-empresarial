<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\Order;
use App\Models\User;

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
            'customer_id' => Customer::factory(),
            'user_id' => User::factory(),
            'deliveryguy' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'deliverytime' => $this->faker->randomNumber(),
            'table' => $this->faker->randomNumber(),
            'note' => $this->faker->text,
            'payed' => $this->faker->boolean,
            'total' => $this->faker->randomFloat(2, 0, 999999.99),
        ];
    }
}
