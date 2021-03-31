<?php

namespace Tests\Feature;

use App\Models\District;
use App\Models\Region;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DistrictTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_get_all_districts_of_a_region()
    {
        $region = Region::factory()->create();
        $district = District::factory()->count(3)->create(['region_id' => $region->id]);

        $response = $this->get("/api/region/{$region->id}/district");

        $response->assertSuccessful()->assertJsonCount(1);
    }

    /** @test */
    public function user_can_create_districts_of_a_region()
    {
        $region = Region::factory()->create();
        $district = District::factory()->create(['region_id' => $region->id]);

        $response = $this->get("/api/region/{$region->id}/district");

        $response->assertSuccessful()->assertStatus(200);
    }
}
