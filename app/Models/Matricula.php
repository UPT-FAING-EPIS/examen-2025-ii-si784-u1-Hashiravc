<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $table = 'matriculas';
    protected $primaryKey = 'id_matricula';
    protected $fillable = ['id_usuario', 'id_curso', 'estado'];

    // Matrícula pertenece a un usuario
    public function usuario() {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }

    // Matrícula pertenece a un curso
    public function curso() {
        return $this->belongsTo(Curso::class, 'id_curso', 'id_curso');
    }
}
