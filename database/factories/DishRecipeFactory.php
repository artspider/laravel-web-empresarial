<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Dish;
use App\Models\DishRecipe;
use App\Models\Recipe;

class DishRecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DishRecipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dish_id' => Dish::factory(),
            'recipe_id' => Recipe::factory(),
            'qty' => $this->faker->randomFloat(2, 0, 99999.99),
        ];
    }
}
