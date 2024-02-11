<?php

namespace Database\Factories;

use App\Models\ConferenceRegistrationUsersAdmins;
use App\Models\User;
use App\Models\Conference;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConferenceRegistrationUsersAdminsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ConferenceRegistrationUsersAdmins::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'conference_id' => Conference::factory()->create()->id,
        ];
    }
}
