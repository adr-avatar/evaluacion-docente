<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Table('preguntas', timestamps: false)]
#[Fillable(['texto', 'tipo', 'seccion', 'orden'])]
class Pregunta extends Model
{
    use HasFactory;

    /**
     * Get the evaluation answers associated with this question.
     */
    public function respuestas(): HasMany
    {
        return $this->hasMany(RespuestaEvaluacion::class, 'pregunta_id');
    }

    /**
     * Cast database attributes to their expected PHP types.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'orden' => 'integer',
        ];
    }
}
