<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
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

    /** @test */
    public function user_has_lastName_attribute()
    {
        $user = User::factory()->create();

        $this->assertEquals($user->lastName, $user->lastName);
        $this->assertNotEmpty($user->lastName);
    }

    /** @test */
    public function user_has_username_attribute()
    {
        $user = User::factory()->create();

        $this->assertEquals($user->username, $user->username);
        $this->assertNotEmpty($user->username);
    }

    /** @test */
    public function user_has_role_attribute()
    {
        $user = User::factory()->create();

        $this->assertEquals($user->role, $user->role);
        $this->assertNotEmpty($user->role);
    }

    /** @test */
    public function user_has_email_attribute()
    {
        $user = User::factory()->create();

        $this->assertEquals($user->email, $user->email);
        $this->assertNotEmpty($user->email);
    }

    /** @test */
    public function user_password_has_hash_attribute()
    {
        $user = User::factory()->create();

        $this->assertTrue(Hash::check('password', $user->password));
    }

    /** @test */
    public function user_can_create_an_account()
    {
        $user = User::factory()->create();

        $this->assertDatabaseHas('users', [
            'firstName' => $user->firstName,
            'username' => $user->username,
            'email' => $user->email,
            'password' => $user->password
        ]);
    }
}
