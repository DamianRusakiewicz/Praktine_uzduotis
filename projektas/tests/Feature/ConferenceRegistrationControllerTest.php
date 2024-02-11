<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Conference;
use App\Models\User;

class ConferenceRegistrationControllerTest extends TestCase
{
    use RefreshDatabase;

// Testing registration
    public function test_user_can_register_for_conference()
    {
        $user = User::factory()->create();
        $conference = Conference::factory()->create();

        $response = $this->actingAs($user)
            ->post(route('conferences.register', $conference->id));

        $response->assertRedirect(route('conferences.index'))
        ->assertSessionHas('success');

        $this->assertDatabaseHas('conference_registrations', [
            'user_id' => $user->id,
            'conference_id' => $conference->id,
        ]);
    }

// Test review
    public function test_user_can_review_conference_registrations()
    {
        $user = User::factory()->create();
        $conference = Conference::factory()->create();
        // Assuming there are registrations for this conference

        $response = $this->actingAs($user)
            ->get(route('conferences.review', $conference->id));

        $response->assertStatus(200)
            ->assertViewIs('review-conference')
            ->assertViewHas('conference', $conference);
    }

// Test unregister
    public function test_user_can_unregister_from_conference()
    {
        $user = User::factory()->create();
        $registration = ConferenceRegistration::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->delete(route('conferences.unregister', $registration->id));

        $response->assertRedirect()
            ->assertSessionHas('success');

        $this->assertDeleted($registration);
    }

}
