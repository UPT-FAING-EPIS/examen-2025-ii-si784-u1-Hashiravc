<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    // Listar todos los cursos
    public function index()
    {
        return response()->json(Curso::all());
    }

    // Mostrar un curso por ID
    public function show($id)
    {
        $curso = Curso::findOrFail($id);
        return response()->json($curso);
    }

    // Crear un curso
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:150',
            'descripcion' => 'nullable|string',
            'categoria' => 'nullable|string|max:100',
            'nivel' => 'in:basico,intermedio,avanzado',
            'duracion' => 'nullable|integer',
            'precio' => 'nullable|numeric',
            'capacidad' => 'nullable|integer',
            'id_instructor' => 'required|exists:usuarios,id_usuario'
        ]);

        $curso = Curso::create($request->all());
        return response()->json($curso, 201);
    }

    // Actualizar curso
    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->update($request->all());
        return response()->json($curso);
    }

    // Eliminar curso
    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();
        return response()->json(['mensaje' => 'Curso eliminado']);
    }
}
