<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiRoutesTest extends TestCase
{
    public function testRootApiRoute()
    {
        $response = $this->get('/api');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Hello World',
        ]);
    }


    public function testLoginApiRoute()
    {
        // Simulate the request payload
        $payload = [
            'email' => 'user@example.com',
            'password' => 'password123'
        ];

        // Make the POST request to the login endpoint
        $response = $this->postJson('/api/login', $payload);

        // Assert the response status and structure
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'user@example.com',
            'status' => 200,
        ]);
    }


    public function testRegisterApiRoute()
    {
        // Simulate the request payload
        $payload = [
            'name' => 'John Doe',
            'email' => 'user@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123'
        ];

        // Make the POST request to the register endpoint
        $response = $this->postJson('/api/register', $payload);

        // Assert the response status and structure
        $response->assertStatus(201);
        $response->assertJson([
            'message' => 'User registered successfully',
            'status' => 201,
        ]);
    }
}
