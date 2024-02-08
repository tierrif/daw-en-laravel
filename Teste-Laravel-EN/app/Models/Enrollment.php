<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $table = 'enrollment';
    protected $primaryKey = 'student_uc_id';
    public $timestamps = false;

    use HasFactory;
}
