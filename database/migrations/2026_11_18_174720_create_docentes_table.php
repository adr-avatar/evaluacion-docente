
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('numero_empleado');
            $table->string('nombre_completo');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};
