<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Unit;

class UnitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Unit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'unit' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'type' => $this->faker->randomElement(["solid","weight","temperature","liquid","volume"]),
            'equivalence' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'slug' => $this->faker->slug,
            'abbreviation' => $this->faker->regexify('[A-Za-z0-9]{20}'),
        ];
    }
}
