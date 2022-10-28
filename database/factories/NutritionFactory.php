<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Nutrition;
use App\Models\Recipe;

class NutritionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Nutrition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'recipe_id' => Recipe::factory(),
            'calories' => $this->faker->randomNumber(),
            'carbohydrate' => $this->faker->randomNumber(),
            'cholesterol' => $this->faker->randomNumber(),
            'fat' => $this->faker->randomNumber(),
            'transfat' => $this->faker->randomNumber(),
            'saturatedfat' => $this->faker->randomNumber(),
            'unsaturatedfat' => $this->faker->randomNumber(),
            'fiber' => $this->faker->randomNumber(),
            'sodium' => $this->faker->randomNumber(),
            'sugar' => $this->faker->randomNumber(),
            'servingsize' => $this->faker->randomNumber(),
        ];
    }
}
