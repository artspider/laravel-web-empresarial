<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Dish;

class DishFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dish::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'servtime' => $this->faker->randomNumber(),
            'yield' => $this->faker->randomNumber(),
            'cuisine' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'price' => $this->faker->randomFloat(2, 0, 99999.99),
            'cost' => $this->faker->randomFloat(2, 0, 99999.99),
            'costpriceratio' => $this->faker->randomFloat(2, 0, 99999.99),
            'mc' => $this->faker->randomFloat(2, 0, 99999.99),
            'profit' => $this->faker->randomFloat(2, 0, 99999.99),
            'deliverycharge' => $this->faker->randomFloat(2, 0, 99999.99),
            'instock' => $this->faker->boolean,
            'rating' => $this->faker->randomNumber(),
            'slug' => $this->faker->slug,
        ];
    }
}
