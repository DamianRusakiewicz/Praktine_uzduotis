<?php

namespace Database\Factories;

use App\Models\Conference; // Import the Conference model
use Illuminate\Database\Eloquent\Factories\Factory;

class ConferenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Conference::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'author' => $this->faker->name(),
            'time' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'description' => $this->faker->paragraph(),
            'expired' => $this->faker->boolean(20), // 20% chance of being expired
        ];
    }
}
