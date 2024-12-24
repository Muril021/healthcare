<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AvailableTime extends Model
{
    use SoftDeletes;

    protected $table = 'available_times';

    protected $fillable = [
        'specialty_id',
        'doctor_id',
        'schedule_id',
        'date'
    ];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->attributes['date'])
            ->format('d/m/Y');
    }
}
