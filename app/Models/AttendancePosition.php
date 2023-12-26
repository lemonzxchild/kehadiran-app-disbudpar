<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendancePosition extends Model
{
    use HasFactory;

    protected $table = 'attendance_position';
    protected $guarded = ['id'];
}
