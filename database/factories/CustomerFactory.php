<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Customer;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'fav1' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'fav2' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'fav3' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'priority' => $this->faker->randomNumber(),
        ];
    }
}
