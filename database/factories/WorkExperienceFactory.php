<?php

namespace Database\Factories;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkExperienceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'applicant_id' => Applicant::factory(),
            'company_name' => $this->faker->company,
            'position' => $this->faker->jobTitle,
            'duration' => $this->faker->date('M Y') . ' - ' . $this->faker->date('M Y'),
            'description' => $this->faker->paragraph,
        ];
    }
}
