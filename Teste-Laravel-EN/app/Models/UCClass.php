<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// Este nome não pode ser conforme o enunciado uma vez que "class" é uma palavra reservada do PHP.
class UCClass extends Model
{
    protected $table = 'class';
    protected $primaryKey = 'class_id';

    use HasFactory;

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class, 'class_id', 'class_id');
    }
}
