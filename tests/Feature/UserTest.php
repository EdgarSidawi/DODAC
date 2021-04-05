<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function user_can_login()
    {
        $user = User::factory()->create();
        $data = [
            'username' => 'johhn',
            'password' => $user->password
        ];

        $response = $this->post('/api/login', $data);

        $response->assertOk();
    }
}
