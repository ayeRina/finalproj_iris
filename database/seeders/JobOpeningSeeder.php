<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobOpening;

class JobOpeningSeeder extends Seeder
{
    public function run(): void
    {
        JobOpening::factory()->count(20)->create();
    }
}
