<?php

namespace Tests\Feature;

use App\Http\Controllers\PatientController;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PatientTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function user_can_get_all_patients()
    {
        $response = $this->get("/api/patient");

        $response->assertSuccessful()
            ->assertStatus(200)
            ->assertJsonCount(1);
    }

    /** @test */
    public function user_can_create_patient()
    {
        $data = [
            'firstName' => 'Howardlyy',
            'lastName' => 'Kemmer',
            'dateOfBirth' => now(),
            'allergies' => 'allergic to bee sting',
            'last_disease_diagnosed' => 'malaria'
        ];

        $response = $this->post("/api/patient", $data);

        $response->assertSuccessful()
            ->assertStatus(200);
    }

    /** @test */
    public function user_can_get_a_patient()
    {
        $patient = Patient::factory()->create();

        $response = $this->get("/api/patient/{$patient->id}");

        $response->assertSuccessful()
            ->assertStatus(200);
    }


    /** @test */
    public function user_can_update_a_patient()
    {
        $patient = Patient::factory()->create();
        $data = [
            'firstName' => 'foo'
        ];
        $response = $this->put("/api/patient/{$patient->id}", $data);

        $response->assertSuccessful()
            ->assertStatus(200);
    }


    /** @test */
    public function user_can_delete_a_patient()
    {
        $patient = Patient::factory()->create();

        $response = $this->delete("/api/patient/{$patient->id}");

        $response->assertSuccessful()
            ->assertStatus(201);
    }
}
