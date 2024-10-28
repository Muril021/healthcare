<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Specialty extends Model
{
    protected $table = 'specialties';

    protected $fillable = [
        'name',
        'description',
        'slug',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($specialty) {
            $specialty->slug = Str::slug($specialty->name);
        });
    }
}
