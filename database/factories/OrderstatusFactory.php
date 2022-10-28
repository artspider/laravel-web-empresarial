<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Orderstatus;
use App\Models\Ordr;

class OrderstatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Orderstatus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ordr_id' => Ordr::factory(),
            'status' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'done' => $this->faker->boolean,
        ];
    }
}
