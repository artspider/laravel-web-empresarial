<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Recipe;
use App\Models\Recipecategory;
use App\Models\Unit;

class RecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'recipecategory_id' => Recipecategory::factory(),
            'unit_id' => Unit::factory(),
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'preptime' => $this->faker->randomNumber(),
            'cooktime' => $this->faker->randomNumber(),
            'totaltime' => $this->faker->randomNumber(),
            'recipeyield' => $this->faker->text,
            'diet' => $this->faker->randomElement(["DiabeticDiet","GlutenFreeDiet","HalalDiet","HinduDiet","KosherDiet","LowCalorieDiet","LowFatDiet","LowLactoseDiet","LowSaltDiet","VeganDiet","VegetarianDiet"]),
            'cuisine' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'price' => $this->faker->randomFloat(2, 0, 99999.99),
            'cost' => $this->faker->randomFloat(2, 0, 99999.99),
            'costpriceratio' => $this->faker->randomFloat(2, 0, 99999.99),
            'mc' => $this->faker->randomFloat(2, 0, 99999.99),
            'profit' => $this->faker->randomFloat(2, 0, 99999.99),
            'deliverycharge' => $this->faker->randomFloat(2, 0, 99999.99),
            'instock' => $this->faker->boolean,
            'slug' => $this->faker->slug,
        ];
    }
}
