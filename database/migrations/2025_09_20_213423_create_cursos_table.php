<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id('id_curso');
            $table->string('titulo', 150);
            $table->text('descripcion')->nullable();
            $table->string('categoria', 100)->nullable();
            $table->enum('nivel', ['basico', 'intermedio', 'avanzado'])->default('basico');
            $table->integer('duracion')->nullable();
            $table->decimal('precio', 10, 2)->default(0.00);
            $table->unsignedInteger('capacidad')->nullable();
            $table->unsignedBigInteger('id_instructor');
            $table->timestamps();

            $table->foreign('id_instructor')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
