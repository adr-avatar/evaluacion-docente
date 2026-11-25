<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Table('docentes', timestamps: false)]
#[Fillable(['numero_empleado', 'nombre_completo'])]
class Docente extends Model
{
    use HasFactory;

    /**
     * Get the assignments assigned to this teacher.
     */
    public function asignaciones(): HasMany
    {
        return $this->hasMany(Asignacion::class, 'docente_id');
    }
}
