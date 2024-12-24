<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'doctors';

    protected $fillable = [
        'name',
        'crm_number',
        'specialty_id',
    ];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class, 'specialty_id', 'id');
    }

    public function availableTimes()
    {
        return $this->belongsToMany(
            Schedule::class,
            'available_times',
            'specialty_id',
            'doctor_id',
            'schedule_id',
            'date'
        );
    }
}
