<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Recipe;
use App\Models\Recipebase;

class RecipebaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipebase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'recipe_id' => Recipe::factory(),
            'qty' => $this->faker->randomFloat(2, 0, 99999.99),
            'qtyleft' => $this->faker->randomFloat(2, 0, 99999.99),
            'waste' => $this->faker->randomNumber(),
            'status' => $this->faker->randomNumber(),
        ];
    }
}
