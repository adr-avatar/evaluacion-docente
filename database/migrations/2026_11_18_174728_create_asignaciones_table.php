
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('periodo_id')
                  ->constrained('periodos');

            $table->foreignId('docente_id')
                  ->constrained('docentes');

            $table->string('materia');
            $table->string('grupo');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asignaciones');
    }
};
