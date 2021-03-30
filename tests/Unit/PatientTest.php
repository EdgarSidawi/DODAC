<?php

namespace Tests\Unit;

use App\Models\Patient;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class PatientTest extends TestCase
{

    /** @test */
    public function patient_has_firstName_attribute()
    {
        $patient = Patient::factory()->create();

        $this->assertEquals($patient->firstName, $patient->firstName);
        $this->assertNotEmpty($patient->firstName);
    }

    /** @test */
    public function patient_has_lastName_attribute()
    {
        $patient = Patient::factory()->create();

        $this->assertEquals($patient->lastName, $patient->lastName);
        $this->assertNotEmpty($patient->lastName);
    }
}
