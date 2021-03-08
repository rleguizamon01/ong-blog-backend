<?php

namespace Database\Factories;

use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subscriber::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstname(),
            'last_name' => $this->faker->lastname(),
            'email' => $this->faker->unique()->safeEmail,
            'ip' => $this->faker->randomElement([$this->faker->ipv4(), $this->faker->ipv6()]),
            'deleted_at' => $this->faker->randomElement([now(), null]),
        ];
    }
}
