<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Dish;
use App\Models\DishProduct;
use App\Models\Product;
use App\Models\Unit;

class DishProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DishProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dish_id' => Dish::factory(),
            'product_id' => Product::factory(),
            'unit_id' => Unit::factory(),
            'qty' => $this->faker->randomFloat(2, 0, 99999.99),
        ];
    }
}
