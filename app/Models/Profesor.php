<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profesor extends Model
{
    use HasFactory;  

    protected $table="profesores";

    protected $appends = ['fullname'];

    public function fullname():Attribute
    {
        return Attribute::make(
            get: fn () => "{$this->nombre} {$this->apellido_paterno} {$this->apellido_materno}",
        );
    }

    public function cursos():HasMany{
        return $this->hasMany(Curso::class, 'profesor_id', 'id');
    }
    
}
