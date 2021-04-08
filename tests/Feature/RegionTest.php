<?php

namespace Tests\Feature;

use App\Models\Region;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class RegionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_get_all_regions()
    {
        Sanctum::actingAs(
            User::factory()->create(),
        );

        $response = $this->get('/api/region');

        $response->assertSuccessful()
            ->assertJsonCount(1);
    }


    /** @test */
    public function user_can_create_region()
    {
        Sanctum::actingAs(
            User::factory()->create(),
        );

        $response = $this->post('/api/region', [
            'name' => 'foo'
        ]);

        $response->assertSuccessful();
    }


    /** @test */
    public function user_can_get_a_region()
    {
        Sanctum::actingAs(
            User::factory()->create(),
        );

        $region = Region::factory()->create();

        $response = $this->get("/api/region/{$region->id}");

        $response->assertSuccessful()
            ->assertStatus(200)
            ->assertJsonCount(1);
    }


    /** @test */
    public function user_can_update_a_region()
    {
        Sanctum::actingAs(
            User::factory()->create(),
        );

        $region = Region::factory()->create();
        $data = [
            'name' => 'foo'
        ];

        $response = $this->put("/api/region/{$region->id}", $data);

        $response->assertSuccessful();
    }


    /** @test */
    public function user_can_delete_a_region()
    {
        Sanctum::actingAs(
            User::factory()->create(),
        );

        $region = Region::factory()->create();

        $response = $this->delete("/api/region/{$region->id}");

        $response->assertSuccessful();
    }
}
