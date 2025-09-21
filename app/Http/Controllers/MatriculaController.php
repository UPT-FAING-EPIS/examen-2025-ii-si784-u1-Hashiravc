<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatriculaController extends Controller
{
    // Listar todas las matrículas
    public function index()
    {
        $matriculas = DB::table('matriculas')
            ->join('cursos', 'matriculas.id_curso', '=', 'cursos.id_curso')
            ->select('matriculas.*', 'cursos.titulo as curso_titulo', 'cursos.descripcion as curso_descripcion')
            ->get();

        return response()->json($matriculas);
    }

    // Ver las matrículas de un usuario
    public function getByUsuario($id_usuario)
    {
        $matriculas = DB::table('matriculas')
            ->where('id_usuario', $id_usuario)
            ->join('cursos', 'matriculas.id_curso', '=', 'cursos.id_curso')
            ->select('matriculas.*', 'cursos.titulo', 'cursos.descripcion', 'cursos.categoria', 'cursos.nivel', 'cursos.duracion', 'cursos.precio', 'cursos.capacidad')
            ->get();

        return response()->json($matriculas);
    }

    // Matricular a un usuario en un curso usando el procedimiento almacenado
    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|integer|exists:usuarios,id_usuario',
            'id_curso' => 'required|integer|exists:cursos,id_curso'
        ]);

        $resultado = '';
        DB::statement('CALL sp_matricular_usuario(?, ?, ?)', [
            $request->id_usuario,
            $request->id_curso,
            &$resultado
        ]);

        return response()->json(['resultado' => $resultado]);
    }

    // Cancelar una matrícula
    public function destroy($id_matricula)
    {
        $matricula = DB::table('matriculas')->where('id_matricula', $id_matricula)->first();

        if (!$matricula) {
            return response()->json(['error' => 'Matrícula no encontrada'], 404);
        }

        DB::table('matriculas')->where('id_matricula', $id_matricula)->update(['estado' => 'cancelado']);

        return response()->json(['mensaje' => 'Matrícula cancelada']);
    }
}
