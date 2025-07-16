<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantFactory extends Factory
{
    public function definition(): array
    {
        return [
            'fname' => $this->faker->firstName,
            'lname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'sex' => $this->faker->randomElement(['Male', 'Female']),
            'birthday' => $this->faker->date('Y-m-d', '2005-01-01'),
            'contact' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
        ];
    }
}
