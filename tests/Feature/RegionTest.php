<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_get_all_regions()
    {
        $response = $this->get('/api/region');

        $response->assertSuccessful()->assertStatus(200)->assertJsonCount(1);
    }
}
