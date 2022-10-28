<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Instruction;
use App\Models\Recipe;

class InstructionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Instruction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'recipe_id' => Recipe::factory(),
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'image' => $this->faker->regexify('[A-Za-z0-9]{100}'),
        ];
    }
}
