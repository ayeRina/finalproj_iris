<?php

namespace Database\Factories;

use App\Models\Applicant;
use App\Models\JobOpening;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobApplicationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'applicant_id' => Applicant::factory(),
            'job_opening_id' => JobOpening::factory(),
            'status' => $this->faker->randomElement(['line up', 'on process', 'for interview', 'for medical', 'deployed']),
            'remarks' => $this->faker->optional()->sentence,
        ];
    }
}
