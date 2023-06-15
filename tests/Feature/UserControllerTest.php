<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase; // Use this trait to reset the database after each test case

    /**
     * Test the signup method.
     */
    public function testSignup()
    {
        // Generate fake user data for testing
        $userData = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password',
        ];

        // Send a POST request to the signup route with the fake user data
        $response = $this->post('/signup', $userData);

        // Assert that the user was created successfully
        $response->assertStatus(302); // Check the appropriate HTTP status code
        $this->assertDatabaseHas('users', ['email' => 'johndoe@example.com']); // Check if the user was stored in the database
    }

    /**
     * Test the authenticate method.
     */
    public function testAuthenticate()
    {
        // Create a fake user in the database for testing
        $user = User::factory()->create([
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password'),
        ]);

        // Send a POST request to the authenticate route with the user's credentials
        $response = $this->post('/signin', [
            'email' => 'johndoe@example.com',
            'password' => 'password',
        ]);

        // Assert that the user was authenticated successfully
        $response->assertRedirect('/home'); // Check if the user was redirected to the home page
        $this->assertAuthenticatedAs($user); // Check if the user is authenticated
    }

    /**
     * Test the logout method.
     */
    public function testLogout()
    {
        // Create a fake authenticated user for testing
        $user = User::factory()->create();
        $this->actingAs($user); // Set the authenticated user

        // Send a GET request to the logout route
        $response = $this->get('/logout');

        // Assert that the user was logged out successfully
        $response->assertRedirect('/signin'); // Check if the user was redirected to the sign-in page
        $this->assertGuest(); // Check if the user is not authenticated
    }
}
