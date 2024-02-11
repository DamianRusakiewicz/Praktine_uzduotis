<?php

namespace Database\Factories;

use App\Models\Conference;
use App\Models\ConferenceRegistration;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConferenceRegistrationFactory extends Factory
{
    protected $model = ConferenceRegistration::class;

    public function definition()
    {
        // Getting random user and conference IDs
        $user_id = User::inRandomOrder()->first()->id;
        $conference_id = Conference::inRandomOrder()->first()->id;

        return [
            'user_id' => $user_id,
            'conference_id' => $conference_id,
        ];
    }
}
