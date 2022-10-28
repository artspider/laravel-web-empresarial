<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Recipe;
use App\Models\Reciperating;

class ReciperatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reciperating::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'recipe_id' => Recipe::factory(),
            'value' => $this->faker->randomNumber(),
            'count' => $this->faker->randomNumber(),
        ];
    }
}
