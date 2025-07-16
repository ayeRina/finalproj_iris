<?php

namespace Database\Factories;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationalBackgroundFactory extends Factory
{
    public function definition(): array
    {
        return [
            'applicant_id' => Applicant::inRandomOrder()->first()?->id ?? Applicant::factory(),
            'school_name' => $this->faker->company . ' School',
            'level' => $this->faker->randomElement(['High School', 'College', 'Vocational']),
            'course' => $this->faker->randomElement(['IT', 'Nursing', 'Business', null]),
            'year_graduated' => $this->faker->year(),
        ];
    }
}
