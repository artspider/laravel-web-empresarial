<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Supplier;

class SupplierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Supplier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_name' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'contact_name' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'contact_title' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'address' => $this->faker->word,
            'suburb' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'city' => $this->faker->city,
            'state' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'zip' => $this->faker->postcode,
            'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->word,
        ];
    }
}
