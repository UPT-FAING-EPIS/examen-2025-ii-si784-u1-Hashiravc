<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id('id_matricula');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_curso');
            $table->enum('estado', ['activo', 'cancelado', 'finalizado'])->default('activo');
            $table->timestamps();

            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_curso')->references('id_curso')->on('cursos')->onDelete('cascade');
            $table->unique(['id_usuario', 'id_curso', 'estado'], 'uq_matricula');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
