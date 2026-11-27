<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('preguntas', function (Blueprint $table) {
            $table->boolean('activa')->default(true)->after('orden');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('preguntas', function (Blueprint $table) {
            $table->dropColumn(['activa', 'created_at', 'updated_at']);
        });
    }
};