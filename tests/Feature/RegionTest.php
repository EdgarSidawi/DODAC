<?php

namespace Tests\Feature;

use App\Models\Region;
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

        $response->assertSuccessful()
            ->assertStatus(200)
            ->assertJsonCount(1);
    }


    /** @test */
    public function user_can_create_region()
    {
        $response = $this->post('/api/region', [
            'name' => 'foo'
        ]);

        $response->assertSuccessful()
            ->assertStatus(200);
    }


    /** @test */
    public function user_can_get_a_region()
    {
        $region = Region::factory()->create();

        $response = $this->get("/api/region/{$region->id}");

        $response->assertSuccessful()
            ->assertStatus(200)
            ->assertJsonCount(1);
    }


    /** @test */
    public function user_can_update_a_region()
    {
        $region = Region::factory()->create();
        $data = [
            'name' => 'foo'
        ];

        $response = $this->put("/api/region/{$region->id}", $data);

        $response->assertSuccessful()
            ->assertStatus(200);
    }
}
