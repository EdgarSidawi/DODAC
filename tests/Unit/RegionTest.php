<?php

namespace Tests\Unit;

use App\Models\Region;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use PHPUnit\Framework\TestCase;
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
}
