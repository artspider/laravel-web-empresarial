<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Paymethod;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'paymethod_id' => Paymethod::factory(),
            'payed' => $this->faker->randomFloat(2, 0, 99999999.99),
            'change' => $this->faker->randomFloat(2, 0, 99999.99),
        ];
    }
}
