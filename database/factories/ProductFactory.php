<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'category_id' => Category::factory(),
            'supplier_id' => Supplier::factory(),
            'price' => $this->faker->randomFloat(2, 0, 99999.99),
            'stock' => $this->faker->randomFloat(2, 0, 99999.99),
            'slug' => $this->faker->slug,
            'presentation' => $this->faker->regexify('[A-Za-z0-9]{30}'),
            'brand' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'other' => $this->faker->text,
            'content' => $this->faker->paragraphs(3, true),
        ];
    }
}
