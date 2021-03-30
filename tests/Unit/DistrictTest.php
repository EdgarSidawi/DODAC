<?php

namespace Tests\Unit;

use App\Models\Disease;
use App\Models\District;
use App\Models\Region;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DistrictTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function district_has_name_attribute()
    {
        $region = Region::factory()->create();
        $district = $region->district()->create([
            'name' => 'foo',
        ]);

        $this->assertEquals($district->name, $district->name);
        $this->assertNotEmpty($district);
    }

    /** @test */
    public function district_belongs_to_region()
    {
        $region = Region::factory()->create();
        $district = $region->district()->create([
            'name' => 'foo',
        ]);

        $this->assertInstanceOf(Region::class, $district->region);
    }

    /** @test */
    public function district_has_many_diseases()
    {
        $region = Region::factory()->create();
        $district = $region->district()->create(['name' => 'foo']);
        $disease = Disease::factory()->count(4)->create([
            'district_id' => $district->id
        ]);

        $this->assertEquals(4, $district->disease->count());
    }
}
