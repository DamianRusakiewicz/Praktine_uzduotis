<?php

namespace Tests\Feature;

use App\Models\Conference;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExpiredConferenceControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_expired_conferences_are_displayed()
    {
        // Create some expired conferences
        $expiredConference1 = Conference::factory()->create(['expired' => true]);
        $expiredConference2 = Conference::factory()->create(['expired' => true]);

        $response = $this->get(route('expired.index'));

        // Assert that the response is successful
        $response->assertOk();

        // Checking if view is loaded and contains the correct data
        $response->assertViewIs('expired-conferences')
            ->assertViewHas('expiredConferences', function ($expiredConferences) use ($expiredConference1, $expiredConference2) {
                return $expiredConferences->contains($expiredConference1) &&
                    $expiredConferences->contains($expiredConference2);
            });
    }
}
