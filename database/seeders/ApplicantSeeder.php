<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Applicant;

class ApplicantSeeder extends Seeder
{
    public function run(): void
    {
        Applicant::factory(20)->create();
    }
}
