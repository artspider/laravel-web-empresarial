<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Dish;
use App\Models\DishOrder;
use App\Models\Order;

class DishOrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DishOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dish_id' => Dish::factory(),
            'order_id' => Order::factory(),
            'command' => $this->faker->randomNumber(),
            'qty' => $this->faker->randomNumber(),
            'price' => $this->faker->randomFloat(2, 0, 99999.99),
            'total' => $this->faker->randomFloat(2, 0, 99999.99),
        ];
    }
}
