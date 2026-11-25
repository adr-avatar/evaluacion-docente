<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Table('estudiantes', timestamps: false)]
#[Fillable([
    'matricula',
    'curp',
    'nombre_completo',
    'grupo',
    'turno',
])]
class Estudiante extends Model
{
    use HasFactory;

    /**
     * Get the assignments in which this student is enrolled.
     */
    public function asignaciones(): BelongsToMany
    {
        return $this->belongsToMany(
            Asignacion::class,
            'estudiante_asignacion',
            'estudiante_id',
            'asignacion_id',
        )->withPivot('id', 'completado', 'fecha_evaluacion');
    }
}
