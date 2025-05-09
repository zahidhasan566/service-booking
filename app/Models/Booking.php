<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Add fillable properties to allow mass assignment
    protected $fillable = [
        'name',
        'phone',
        'service_id',
        'status',
        'schedule_time',
    ];
}
