<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Table('periodos', timestamps: false)]
#[Fillable(['nombre', 'activo'])]
class Periodo extends Model
{
    use HasFactory;

    /**
     * Get the assignments that belong to this period.
     */
    public function asignaciones(): HasMany
    {
        return $this->hasMany(Asignacion::class, 'periodo_id');
    }

    /**
     * Cast database attributes to their expected PHP types.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'activo' => 'boolean',
        ];
    }
}
