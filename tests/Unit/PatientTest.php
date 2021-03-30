<?php

namespace Tests\Unit;

use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
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

    /** @test */
    public function patient_has_last_disease_diagnosed_attribute()
    {
        $patient = Patient::factory()->create();

        $this->assertEquals($patient->last_disease_diagnosed, $patient->last_disease_diagnosed);
        $this->assertNotEmpty($patient->last_disease_diagnosed);
    }
}
