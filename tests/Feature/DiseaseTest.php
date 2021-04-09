<?php

namespace Tests\Feature;

use App\Models\Disease;
use App\Models\District;
use App\Models\Region;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DiseaseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_get_all_diseases_of_a_district()
    {
        // Sanctum::actingAs(
        //     User::factory()->create(),
        // );

        $user = User::factory()->create();

        $region = Region::factory()->create();
        $district = District::factory()->create(['region_id' => $region->id]);
        $disease = Disease::factory()->count(5)->create(['district_id' => $district->id]);

        $response = $this->sanctumActingAs($user)->get("/api/district/{$district->id}/disease");

        $response->assertSuccessful()->assertJsonCount(1);
    }


    /** @test */
    public function user_can_create_diseases_of_a_district()
    {
        $user = User::factory()->create();

        $region = Region::factory()->create();
        $district = District::factory()->create(['region_id' => $region->id]);
        $disease = Disease::factory()->create(['district_id' => $district->id]);
        $data = [
            'name' => 'foo',
            'threshold' => 20,
            'current' => 5
        ];

        $response = $this->sanctumActingAs($user)->post("/api/district/{$district->id}/disease", $data);

        $response->assertSuccessful();
    }


    /** @test */
    public function user_can_get_a_disease_of_a_district()
    {
        $user = User::factory()->create();

        $region = Region::factory()->create();
        $district = District::factory()->create(['region_id' => $region->id]);
        $disease = Disease::factory()->create(['district_id' => $district->id]);

        $response = $this->sanctumActingAs($user)->get("/api/district/{$district->id}/disease/{$disease->id}");

        $response->assertSuccessful()->assertJsonCount(1);
    }


    /** @test */
    public function user_can_update_diseases_of_a_district()
    {

        $user = User::factory()->create();

        $region = Region::factory()->create();
        $district = District::factory()->create(['region_id' => $region->id]);
        $disease = Disease::factory()->create(['district_id' => $district->id]);
        $data = [
            'name' => 'foo',
            'threshold' => 20,
            'current' => 5
        ];

        $response = $this->sanctumActingAs($user)->put("/api/district/{$district->id}/disease/{$disease->id}", $data);

        $response->assertSuccessful();
    }


    /** @test */
    public function user_can_delete_diseases_of_a_district()
    {
        $user = User::factory()->create();

        $region = Region::factory()->create();
        $district = District::factory()->create(['region_id' => $region->id]);
        $disease = Disease::factory()->create(['district_id' => $district->id]);

        $response = $this->sanctumActingAs($user)->delete("/api/district/{$district->id}/disease/{$disease->id}");

        $response->assertSuccessful();
    }
}
