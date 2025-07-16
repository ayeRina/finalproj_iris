<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Applicant;
use App\Models\Medical;

class MedicalSeeder extends Seeder
{
    public function run(): void
    {
        $applicants = Applicant::all();

        foreach ($applicants as $applicant) {
            Medical::factory(20)->create([
                'applicant_id' => $applicant->id,
            ]);
        }
    }
}
