
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('respuestas_evaluaciones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('asignacion_id')
                  ->constrained('asignaciones');

            $table->foreignId('pregunta_id')
                  ->constrained('preguntas');

            $table->unsignedTinyInteger('puntuacion')->nullable();
            $table->text('comentario')->nullable();

            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('respuestas_evaluaciones');
    }
};
