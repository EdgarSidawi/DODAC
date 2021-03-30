<?php

namespace Tests\Unit;

use App\Models\District;
use App\Models\Region;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegionTest extends TestCase
{

    use RefreshDatabase;


    /** @test */
    public function region_has_name_attribute()
    {
        $region = Region::create([
            'name' => 'foo',

        ]);

        $this->assertEquals('foo', $region->name);
    }


    /** @test */
    public function region_has_many_districts()
    {
        $region = Region::factory()->create();
        $district = District::factory()->count(4)->create([
            'region_id' => $region->id
        ]);

        $this->assertEquals(4, $region->district()->count());
    }
}
