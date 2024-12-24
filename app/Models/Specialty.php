<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Specialty extends Model
{
    use SoftDeletes;

    protected $table = 'specialties';

    protected $fillable = [
        'name',
        'description',
        'slug',
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function availableTimes()
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

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($specialty) {
            $specialty->slug = Str::slug($specialty->name);
        });
    }
}
