<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Curso extends Model
{
    use HasFactory;

    protected $table="cursos";

    protected $with = ['profesor'];

    public function estudiantes():BelongsToMany{
        return $this->belongsToMany(Estudiante::class, 'curso_estudiante')->withPivot('calificacion');
    }

    public function profesor():BelongsTo{
        return $this->belongsTo(Profesor::class);
    }
}
