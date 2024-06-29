<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = "departamentos";

    /**
     * Relación uno a muchos con la tabla de usuarios.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        // Retorna todos los usuarios que pertenecen a este departamento
        // El primer argumento es el modelo con el que se relaciona, en este caso User
        // El segundo argumento es el nombre de la columna en la tabla users que hace referencia al departamento, en este caso IdDepartamento
        // El tercer argumento es el nombre de la columna en la tabla departamentos que se utiliza como llave primaria, en este caso id
        return $this->hasMany(User::class, 'IdDepartamento', 'id');
    }
}
