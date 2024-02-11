<?php

namespace Database\Seeders;

use App\Models\ConferenceRegistration;
use Illuminate\Database\Seeder;

class ConferenceRegistrationsSeeder extends Seeder
{
    public function run()
    {
        $numberOfRegistrations = 5000;

        ConferenceRegistration::factory()->count($numberOfRegistrations)->create();
    }
}
