<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    // Listar todos los usuarios
    public function index()
    {
        return response()->json(Usuario::all());
    }

    // Mostrar usuario por ID
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return response()->json($usuario);
    }

    // Crear usuario (registro)
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'correo' => 'required|email|unique:usuarios,correo',
            'contrasena' => 'required|string|min:1',
            'rol' => 'in:estudiante,instructor,admin'
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'contrasena' => $request->contrasena, // texto plano
            'rol' => $request->rol ?? 'estudiante'
        ]);

        return response()->json($usuario, 201);
    }

    // Actualizar usuario
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        if ($request->has('nombre')) $usuario->nombre = $request->nombre;
        if ($request->has('correo')) $usuario->correo = $request->correo;
        if ($request->has('contrasena')) $usuario->contrasena = $request->contrasena;
        if ($request->has('rol')) $usuario->rol = $request->rol;

        $usuario->save();
        return response()->json($usuario);
    }

    // Eliminar usuario
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return response()->json(['mensaje' => 'Usuario eliminado']);
    }

    // Login sin hash
    public function login(Request $request)
    {
        $usuario = Usuario::where('correo', $request->correo)->first();

        if (!$usuario) {
            return response()->json(['success' => false, 'message' => 'Usuario no encontrado'], 404);
        }

        if ($usuario->contrasena !== $request->contrasena) {
            return response()->json(['success' => false, 'message' => 'Contraseña incorrecta'], 401);
        }

        return response()->json([
            'success' => true,
            'user' => [
                'id_usuario' => $usuario->id_usuario,
                'nombre' => $usuario->nombre,
                'rol' => $usuario->rol,
                'correo' => $usuario->correo
            ]
        ]);
    }
}
