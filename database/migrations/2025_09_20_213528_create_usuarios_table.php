<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre', 100);
            $table->string('correo', 100)->unique();
            $table->string('contrasena');
            $table->enum('rol', ['estudiante', 'instructor', 'admin'])->default('estudiante');
            $table->timestamps(); // crea created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
