<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table('respuestas_evaluaciones', timestamps: false)]
#[Fillable([
    'asignacion_id',
    'pregunta_id',
    'puntuacion',
    'comentario',
])]
class RespuestaEvaluacion extends Model
{
    use HasFactory;

    /**
     * Get the assignment evaluated by this answer.
     */
    public function asignacion(): BelongsTo
    {
        return $this->belongsTo(Asignacion::class, 'asignacion_id');
    }

    /**
     * Get the question answered by this record.
     */
    public function pregunta(): BelongsTo
    {
        return $this->belongsTo(Pregunta::class, 'pregunta_id');
    }

    /**
     * Cast database attributes to their expected PHP types.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'puntuacion' => 'integer',
            'created_at' => 'datetime',
        ];
    }
}
