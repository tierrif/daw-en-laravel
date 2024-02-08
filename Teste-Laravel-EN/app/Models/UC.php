<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UC extends Model
{
    protected $table = 'uc';
    protected $primaryKey = 'uc_id';
    public $timestamps = false;

    use HasFactory;

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'enrollment', 'uc_id', 'student_id');
    }

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class, 'uc_id', 'uc_id');
    }
}
