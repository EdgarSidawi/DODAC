<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_login()
    {
        $user = User::factory()->create();
        $data = [
            'username' => $user->username,
            'password' => 'password'
        ];
        $response = $this->post('/api/login', $data);
        $response->assertOk();
    }

    /** @test */
    public function user_can_signup()
    {
        $data = [
            'firstName' => 'foo',
            'lastName' => 'bar',
            'role' => 'nurse',
            'username' => 'foobar',
            'email' => 'me@example.com',
            'password' => 'password'
        ];
        $response = $this->post('/api/signup', $data);
        $response->assertOk();
    }

    /** @test */
    public function user_can_logout()
    {
        $user = User::factory()->create();
        $response = $this->sanctumActingAs($user)
            ->delete('/api/logout');
        $response->assertSuccessful();
    }
}
