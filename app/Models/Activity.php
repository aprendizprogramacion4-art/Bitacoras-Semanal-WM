<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'title',
        'description',
        'project',
        'activity_date',
        'duration_hours',
        'status',
    ];

    protected $casts = [
        'activity_date' => 'date',
        'duration_hours' => 'decimal:2',
    ];
}
