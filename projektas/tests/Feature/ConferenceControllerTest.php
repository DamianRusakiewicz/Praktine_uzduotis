<?php

namespace Tests\Feature;

use App\Models\Conference;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConferenceControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_displays_active_conferences()
    {
        // Creating some fake active conferences
        $activeConference1 = Conference::factory()->create(['expired' => false]);
        $activeConference2 = Conference::factory()->create(['expired' => false]);

        $response = $this->get(route('conferences.index'));

        // Assert that the response is successful
        $response->assertOk();

        // Assert that the view is loaded and contains the correct data
        $response->assertViewIs('conference')
            ->assertViewHas('conferences', function ($conferences) use ($activeConference1, $activeConference2) {
                return $conferences->contains($activeConference1) &&
                    $conferences->contains($activeConference2);
            });
    }

    public function test_store_method_creates_new_conference()
    {
        // Creating some data
        $formData = [
            'title' => 'Test',
            'author' => 'Damian',
            'time' => '2024-02-12 10:00:00',
            'description' => 'This is a test conference!!',
        ];

        $response = $this->post(route('conferences.store'), $formData); // Assuming the route name is 'conferences.store'

        // Checking if conference is created in the database
        $this->assertDatabaseHas('conferences', $formData);

        // Checking if user gets redirected to page with success message
        $response->assertRedirect(route('conferences.index'));
        $response->assertSessionHas('success', 'Conference created successfully!');
    }
}

