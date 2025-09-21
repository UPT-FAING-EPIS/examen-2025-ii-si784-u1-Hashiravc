<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $fillable = ['nombre', 'correo', 'contrasena', 'rol'];

    // Un usuario puede tener muchas matrículas
    public function matriculas() {
        return $this->hasMany(Matricula::class, 'id_usuario', 'id_usuario');
    }

    // Si es instructor, puede tener muchos cursos
    public function cursos() {
        return $this->hasMany(Curso::class, 'id_instructor', 'id_usuario');
    }
}
