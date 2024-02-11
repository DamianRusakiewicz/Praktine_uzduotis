<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Conference; // Import the Conference model

class ConferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 20 conferences using the Conference factory
        Conference::factory()->count(20)->create();
    }
}
