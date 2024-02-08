<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';
    protected $primaryKey = 'attendance_id';
    protected $fillable = ['student_id', 'class_id'];
    public $timestamps = false;

    use HasFactory;
}
