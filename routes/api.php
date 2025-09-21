<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\MatriculaController;

// ==============================
// Login (sin auth)
// ==============================
Route::post('/login', [UsuarioController::class, 'login']);

// ==============================
// Rutas protegidas con JWT
// ==============================
Route::group(['middleware' => ['auth:api']], function () {

    // ------------------------------
    // Usuarios
    // ------------------------------
    Route::get('/users', [UsuarioController::class, 'index']);      // Listar usuarios (admin)
    Route::get('/users/{id}', [UsuarioController::class, 'show']);  // Ver usuario
    Route::post('/usuarios', [UsuarioController::class, 'store']);  // Crear usuario
    Route::put('/usuarios/{id}', [UsuarioController::class, 'update']); // Actualizar usuario
    Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']); // Eliminar usuario

    // ------------------------------
    // Cursos
    // ------------------------------
    Route::get('/courses', [CursoController::class, 'index']);        // Listar todos los cursos
    Route::get('/courses/{id}', [CursoController::class, 'show']);    // Ver curso
    Route::post('/courses', [CursoController::class, 'store']);       // Crear curso (admin/instructor)
    Route::put('/courses/{id}', [CursoController::class, 'update']);  // Actualizar curso (admin/instructor)
    Route::delete('/courses/{id}', [CursoController::class, 'destroy']); // Eliminar curso (admin/instructor)

    // ------------------------------
    // Matrículas
    // ------------------------------
    Route::post('/enrollments', [MatriculaController::class, 'store']); // Matricular usuario (estudiante)
    Route::get('/enrollments', [MatriculaController::class, 'index']);  // Listar todas las matrículas
    Route::get('/enrollments/usuario/{id_usuario}', [MatriculaController::class, 'getByUsuario']); // Cursos de un usuario
    Route::delete('/enrollments/{id_matricula}', [MatriculaController::class, 'destroy']); // Cancelar matrícula

});
