<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialties = config('specialties');

        foreach ($specialties as $specialty) {
            Specialty::create($specialty);
        }
    }
}
