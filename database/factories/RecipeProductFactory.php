<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Recipe;
use App\Models\RecipeProduct;
use App\Models\Unit;

class RecipeProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RecipeProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'recipe_id' => Recipe::factory(),
            'product_id' => Product::factory(),
            'unit_id' => Unit::factory(),
            'qty' => $this->faker->randomFloat(2, 0, 99999.99),
        ];
    }
}
