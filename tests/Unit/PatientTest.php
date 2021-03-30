<?php

namespace Tests\Unit;

use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class PatientTest extends TestCase
{

    use RefreshDatabase;

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

    /** @test */
    public function patient_has_dateOfBirth_attribute()
    {
        $patient = Patient::factory()->create();

        $this->assertEquals($patient->dateOfBirth, $patient->dateOfBirth);
        $this->assertNotEmpty($patient->dateOfBirth);
    }

    /** @test */
    public function patient_has_allergies_attribute()
    {
        $patient = Patient::factory()->create();

        $this->assertEquals($patient->allergies, $patient->allergies);
        $this->assertNotEmpty($patient->allergies);
    }
}
