<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Sanctum\Sanctum;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function sanctumActingAs(User $user, array $overrides = [])
    {
        Sanctum::actingAs($user, $overrides);
        return $this;
    }
}
