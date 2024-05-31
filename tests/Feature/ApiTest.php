<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
 * Test the root API route.
 *
 * @return void
 */
    public function testRootApiRoute()
    {
        $response = $this->get('/api');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Hello World',
        ]);
    }

    /**
     * Test the login API route.
     *
     * @return void
     */
    public function testLoginApiRoute()
    {
        $response = $this->get('/api/login');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Hello again!',
        ]);
    }
}
