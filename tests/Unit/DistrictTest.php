<?php

namespace Tests\Unit;

use App\Models\District;
use App\Models\Region;
use PHPUnit\Framework\TestCase;

class DistrictTest extends TestCase
{

    /** @test */
    public function district_has_name_attribute()
    {
        $district = District::factory()->create();

        $this->assertEquals($district->name, $district->name);
    }
}
