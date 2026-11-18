
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('matricula');
            $table->string('curp', 18);
            $table->string('nombre_completo');
            $table->string('grupo');
            $table->string('turno');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};

