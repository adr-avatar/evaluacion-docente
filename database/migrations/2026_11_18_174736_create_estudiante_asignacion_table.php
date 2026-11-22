
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estudiante_asignacion', function (Blueprint $table) {
            $table->id();

            $table->foreignId('estudiante_id')
                  ->constrained('estudiantes');

            $table->foreignId('asignacion_id')
                  ->constrained('asignaciones');

            $table->boolean('completado')->default(false);
            $table->date('fecha_evaluacion')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estudiante_asignacion');
    }
};
