
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->text('texto');
            $table->enum('tipo', ['escala', 'texto']);
            $table->enum('seccion', ['docente', 'autoevaluacion']);
            $table->unsignedInteger('orden');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('preguntas');
    }
};
