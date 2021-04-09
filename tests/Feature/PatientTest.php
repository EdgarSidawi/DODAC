<?php

namespace Tests\Feature;

use App\Http\Controllers\PatientController;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class PatientTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function user_can_get_all_patients()
    {
        $user = User::factory()->create();

        $response = $this->sanctumActingAs($user)->get("/api/patient");

        $response->assertSuccessful()
            ->assertJsonCount(1);
    }

    /** @test */
    public function user_can_create_patient()
    {
        $user =  User::factory()->create();

        $data = [
            'firstName' => 'Howardlyy',
            'lastName' => 'Kemmer',
            'dateOfBirth' => now(),
            'allergies' => 'allergic to bee sting',
            'last_disease_diagnosed' => 'malaria'
        ];

        $response = $this->sanctumActingAs($user)->post("/api/patient", $data);

        $response->assertSuccessful();
    }

    /** @test */
    public function user_can_get_a_patient()
    {
        $user =  User::factory()->create();

        $patient = Patient::factory()->create();

        $response = $this->sanctumActingAs($user)->get("/api/patient/{$patient->id}");

        $response->assertSuccessful();
    }


    /** @test */
    public function user_can_update_a_patient()
    {
        $user =  User::factory()->create();

        $patient = Patient::factory()->create();
        $data = [
            'firstName' => 'Howardlyy',
            'lastName' => 'Kemmer',
            'dateOfBirth' => now(),
            'allergies' => 'allergic to bee sting',
            'last_disease_diagnosed' => 'malaria'
        ];
        $response = $this->sanctumActingAs($user)->put("/api/patient/{$patient->id}", $data);

        $response->assertSuccessful();
    }


    /** @test */
    public function user_can_delete_a_patient()
    {
        $user = User::factory()->create();

        $patient = Patient::factory()->create();

        $response = $this->sanctumActingAs($user)->delete("/api/patient/{$patient->id}");

        $response->assertSuccessful()
            ->assertStatus(201);
    }
}
