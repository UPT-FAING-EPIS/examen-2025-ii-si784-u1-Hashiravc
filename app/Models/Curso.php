<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';
    protected $primaryKey = 'id_curso';
    protected $fillable = ['titulo', 'descripcion', 'categoria', 'nivel', 'duracion', 'precio', 'capacidad', 'id_instructor'];

    // Curso pertenece a un instructor
    public function instructor() {
        return $this->belongsTo(Usuario::class, 'id_instructor', 'id_usuario');
    }

    // Curso tiene muchas matrículas
    public function matriculas() {
        return $this->hasMany(Matricula::class, 'id_curso', 'id_curso');
    }
}
