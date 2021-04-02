<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_has_firstName_attribute()
    {
        $user = User::create([
            'firstName' => 'foo',
            'lastName' => 'bar',
            'username' => 'too',
            'role' => 'nurse',
            'email' => 'me@example.com',
            'password' => 'password'
        ]);

        $this->assertEquals('foo', $user->firstName);
        $this->assertNotEmpty($user->firstName);
    }
}
