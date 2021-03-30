<?php

namespace Tests\Unit;

use App\Models\Disease;
use App\Models\District;
use App\Models\Region;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DiseaseTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function disease_has_name_attribute()
    {
        $region = Region::factory()->create();
        $district = $region->district()->create([
            'name' => 'bar'
        ]);
        $disease = $district->disease()->create([
            'name' => 'foo',
            'threshold' => 10,
            'current' => 1
        ]);

        $this->assertEquals($disease->name, $disease->name);
        $this->assertNotEmpty($disease->name);
    }

    /** @test */
    public function disease_has_threshold_attribute()
    {
        $region = Region::factory()->create();
        $district = $region->district()->create([
            'name' => 'bar'
        ]);
        $disease = $district->disease()->create([
            'name' => 'foo',
            'threshold' => 10,
            'current' => 1
        ]);

        $this->assertEquals(10, $disease->threshold);
        $this->assertNotEmpty($disease->threshold);
    }
}
