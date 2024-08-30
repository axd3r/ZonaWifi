<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asignamiento_codigos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_asignamiento');
            $table->foreignId('usuario_id');
            $table->foreignId('codigo_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignamiento_codigos');
    }
};
