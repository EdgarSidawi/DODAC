<?php

namespace Tests\Feature;

use App\Models\District;
use App\Models\Region;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DistrictTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_get_all_districts_of_a_region()
    {
        Sanctum::actingAs(
            User::factory()->create(),
        );

        $region = Region::factory()->create();
        $district = District::factory()->count(3)->create(['region_id' => $region->id]);

        $response = $this->get("/api/region/{$region->id}/district");

        $response->assertSuccessful()->assertJsonCount(1);
    }

    /** @test */
    public function user_can_create_districts_of_a_region()
    {
        Sanctum::actingAs(
            User::factory()->create(),
        );

        $region = Region::factory()->create();
        $district = District::factory()->create(['region_id' => $region->id]);
        $data = ['name' => 'foo'];

        $response = $this->post("/api/region/{$region->id}/district", $data);

        $response->assertSuccessful();
    }

    /** @test */
    public function user_can_get_a_district_of_a_region()
    {
        Sanctum::actingAs(
            User::factory()->create(),
        );

        $region = Region::factory()->create();
        $district = District::factory()->create(['region_id' => $region->id]);

        $response = $this->get("/api/region/{$region->id}/district/{$district->id}");

        $response->assertSuccessful();
    }

    /** @test */
    public function user_can_update_a_district_of_a_region()
    {
        Sanctum::actingAs(
            User::factory()->create(),
        );

        $region = Region::factory()->create();
        $district = District::factory()->create(['region_id' => $region->id]);
        $data = ['name' => 'foo'];

        $response = $this->put("/api/region/{$region->id}/district/{$district->id}", $data);

        $response->assertSuccessful();
    }

    /** @test */
    public function user_can_delete_a_district_of_a_region()
    {
        Sanctum::actingAs(
            User::factory()->create(),
        );

        $region = Region::factory()->create();
        $district = District::factory()->create(['region_id' => $region->id]);

        $response = $this->delete("/api/region/{$region->id}/district/{$district->id}");

        $response->assertSuccessful();
    }
}
