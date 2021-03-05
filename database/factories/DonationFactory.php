<?php

namespace Database\Factories;

use App\Models\Donation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DonationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Donation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'amount' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0.01, $max = 1000000),
            'status' => $this->faker->randomElement(['in process', 'accepted', 'failed']),
            'gateway_response' => Str::random(10),
            'deleted_at' => $this->faker->randomElement([now(), null]),
        ];
    }
}
