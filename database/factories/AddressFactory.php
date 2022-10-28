<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Address;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->word,
            'suburb' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'city' => $this->faker->city,
            'state' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'zip' => $this->faker->postcode,
            'country' => $this->faker->country,
            'addressable' => $this->faker->word,
        ];
    }
}
