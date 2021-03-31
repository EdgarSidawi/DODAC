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
}
