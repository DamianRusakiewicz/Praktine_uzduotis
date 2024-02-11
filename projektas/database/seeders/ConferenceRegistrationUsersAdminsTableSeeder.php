<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ConferenceRegistrationUsersAdmins;

class ConferenceRegistrationUsersAdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create conference registrations
        ConferenceRegistrationUsersAdmins::factory()->count(20)->create();
    }
}
