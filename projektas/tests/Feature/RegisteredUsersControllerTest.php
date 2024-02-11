<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisteredUsersControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_registered_users_view()
    {
        // Creating test users
        User::factory()->count(3)->create();

        // Hit the index route of the RegisteredUsersController.
        $response = $this->get(route('registered_users.index'));

        // Checking if response was successful
        $response->assertStatus(200);

        // Checking if registered_users view was returned
        $response->assertViewIs('registered_users');

        // Assert that the users data is passed to the view.
        $response->assertViewHas('users');
    }
}
