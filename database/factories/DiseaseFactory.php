<?php

namespace Database\Factories;

use App\Models\Disease;
use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiseaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Disease::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'district_id' => District::all()->random()->id,
            'threshold' => random_int(1, 10),
            'current' => random_int(0, 10)
        ];
    }
}
