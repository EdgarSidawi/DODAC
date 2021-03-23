<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstName'=> $this->faker->firstName,
            'middleName'=>$this->faker->name,
            'lastName' => $this->faker->lastName,
            'dateOfBirth' => $this->faker->date,
            'age'=> random_int(1,70),
            'allergies'=> $this->faker->sentence,
            'last_disease_diagnosed' => $this->faker->word,
            'last_visited_hospital'=> $this->faker->date
        ];
    }
}
