<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'student_id';
    public $timestamps = false;

    use HasFactory;

    public function ucs(): BelongsToMany
    {
        return $this->belongsToMany(UC::class, 'enrollment', 'student_id', 'uc_id');
    }
}
