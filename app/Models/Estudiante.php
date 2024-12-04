<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Estudiante extends Model
{
    use HasFactory;

    public function cursos():BelongsToMany{
        return $this->belongsToMany(Curso::class, 'curso_estudiante');
    }
}
