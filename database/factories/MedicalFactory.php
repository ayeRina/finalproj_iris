<?php

namespace Database\Factories;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicalFactory extends Factory
{
    public function definition(): array
    {
        return [
            'applicant_id' => Applicant::factory(),
            'exam_date' => $this->faker->date(),
            'clinic_name' => $this->faker->company . ' Clinic',
            'findings' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['fit', 'unfit', 'pending']),
        ];
    }
}
