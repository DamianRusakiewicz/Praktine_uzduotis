<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Call other seeders
        $this->call([
            UsersTableSeeder::class,
            ConferencesTableSeeder::class,
            ConferenceRegistrationUsersAdminsTableSeeder::class, // Add this line
        ]);
    }
}
