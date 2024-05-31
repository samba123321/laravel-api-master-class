<?php

namespace Tests\Feature\Controller;

use Tests\TestCase;
use App\Traits\ApiResponses;

class AuthControllerTest extends TestCase
{
    /**
     * Test the login method in AuthController.
     *
     * @return void
     */
    public function testLogin()
    {

        $response = $this->get('/api/login');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Hello again!',
        ]);
    }
}
