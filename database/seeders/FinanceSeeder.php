<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Finance;

class FinanceSeeder extends Seeder
{
    public function run(): void
    {
        Finance::factory(20)->create();
    }
}
