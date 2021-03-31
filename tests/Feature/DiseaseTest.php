<?php

namespace Tests\Feature;

use App\Models\Disease;
use App\Models\District;
use App\Models\Region;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DiseaseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_get_all_diseases_of_a_district()
    {
        $region = Region::factory()->create();
        $district = District::factory()->create(['region_id' => $region->id]);
        $disease = Disease::factory()->count(5)->create(['district_id' => $district->id]);

        $response = $this->get("/api/district/{$district->id}/disease");

        $response->assertSuccessful()->assertJsonCount(1);
    }


    /** @test */
    public function user_can_create_diseases_of_a_district()
    {
        $region = Region::factory()->create();
        $district = District::factory()->create(['region_id' => $region->id]);
        $disease = Disease::factory()->create(['district_id' => $district->id]);
        $data = [
            'name' => 'foo',
            'threshold' => 20,
            'current' => 5
        ];

        $response = $this->post("/api/district/{$district->id}/disease", $data);

        $response->assertSuccessful()->assertStatus(200);
    }


    /** @test */
    public function user_can_get_a_disease_of_a_district()
    {
        $region = Region::factory()->create();
        $district = District::factory()->create(['region_id' => $region->id]);
        $disease = Disease::factory()->create(['district_id' => $district->id]);

        $response = $this->get("/api/district/{$district->id}/disease/{$disease->id}");

        $response->assertSuccessful()->assertJsonCount(1);
    }


    /** @test */
    public function user_can_update_diseases_of_a_district()
    {
        $region = Region::factory()->create();
        $district = District::factory()->create(['region_id' => $region->id]);
        $disease = Disease::factory()->create(['district_id' => $district->id]);
        $data = [
            'name' => 'foo'
        ];

        $response = $this->put("/api/district/{$district->id}/disease/{$disease->id}", $data);

        $response->assertSuccessful()->assertStatus(200);
    }


    /** @test */
    public function user_can_delete_diseases_of_a_district()
    {
        $region = Region::factory()->create();
        $district = District::factory()->create(['region_id' => $region->id]);
        $disease = Disease::factory()->create(['district_id' => $district->id]);

        $response = $this->delete("/api/district/{$district->id}/disease/{$disease->id}");

        $response->assertSuccessful()->assertStatus(200);
    }
}
