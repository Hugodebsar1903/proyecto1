<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

class Estudiante extends Model
{
    use HasFactory;

    protected $appends = ['fullname'];

    public function cursos(): BelongsToMany
    {
        return $this->belongsToMany(Curso::class, 'curso_estudiante')->withPivot('calificacion');
    }

    public function fullname():Attribute
    {
        return Attribute::make(
            get: fn () => "{$this->nombre} {$this->apellido_paterno} {$this->apellido_materno}",
        );
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d-m-Y')
        );
    }

}
