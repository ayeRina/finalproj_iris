<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobOpeningFactory extends Factory
{
    public function definition(): array
    {
        return [
            'job_title' => $this->faker->jobTitle,
            'job_description' => $this->faker->paragraph,
            'date_needed' => $this->faker->date(),
            'date_expiry' => $this->faker->date(),
            'status' => $this->faker->randomElement(['active', 'inactive', 'expired']),
            'location' => $this->faker->city,
        ];
    }
}
