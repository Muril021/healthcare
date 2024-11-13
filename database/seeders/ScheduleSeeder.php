<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $firstSchedule = Carbon::createFromTime(8, 0, 0);
        $lastSchedule = Carbon::createFromTime(17, 0, 0);

        while ($firstSchedule->lessThan($lastSchedule)) {
            DB::table('schedules')->insert([
                'schedule' => $firstSchedule
            ]);

            $firstSchedule->addMinutes(5);
        }
    }
}
