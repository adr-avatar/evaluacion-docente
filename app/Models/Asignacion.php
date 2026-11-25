<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Table('asignaciones', timestamps: false)]
#[Fillable([
    'periodo_id',
    'docente_id',
    'materia',
    'grupo',
])]
class Asignacion extends Model
{
    use HasFactory;

    /**
     * Get the period to which this assignment belongs.
     */
    public function periodo(): BelongsTo
    {
        return $this->belongsTo(Periodo::class, 'periodo_id');
    }

    /**
     * Get the teacher assigned to this assignment.
     */
    public function docente(): BelongsTo
    {
        return $this->belongsTo(Docente::class, 'docente_id');
    }

    /**
     * Get the students enrolled in this assignment.
     */
    public function estudiantes(): BelongsToMany
    {
        return $this->belongsToMany(
            Estudiante::class,
            'estudiante_asignacion',
            'asignacion_id',
            'estudiante_id',
        )->withPivot('id', 'completado', 'fecha_evaluacion');
    }

    /**
     * Get the answers recorded for this assignment.
     */
    public function respuestas(): HasMany
    {
        return $this->hasMany(RespuestaEvaluacion::class, 'asignacion_id');
    }
}
