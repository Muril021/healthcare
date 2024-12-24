<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $fillable = [
        'schedule'
    ];

    public function doctorSchedules()
    {
        return $this->belongsToMany(
            Doctor::class,
            'available_times',
            'specialty_id',
            'doctor_id',
            'schedule_id',
            'date'
        );
    }

    public function getFormattedScheduleAttribute()
    {
        return Carbon::parse($this->attributes['schedule'])
            ->format('H:i');
    }
}
