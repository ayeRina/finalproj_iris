<?php

namespace Database\Factories;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Factories\Factory;

class FinanceFactory extends Factory {
    public function definition(): array {
        return [
            'applicant_id' => Applicant::factory(),
            'amount' => $this->faker->randomFloat(2, 500, 5000),
            'paid_at' => $this->faker->date(),
            'purpose' => $this->faker->sentence(),
        ];
    }
}

