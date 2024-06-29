<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Codigo_empleado',
        'Nombre',
        'ApellidoP',
        'ApellidoM',
        'email',
        'password',
        'status',
        'IdDepartamento',
        'IdPuesto',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Define los atributos que deben ser casteados en el modelo.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        // 'email_verified_at' se castea a un objeto DateTime.
        // 'password' se castea a un hash de contraseña.
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
     * Relación uno a muchos con la tabla de departamentos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function departamento(){
        // El modelo con el que se relaciona es Departamento
        // El segundo argumento es el nombre de la columna en la tabla users que hace referencia al departamento, en este caso IdDepartamento
        // El tercer argumento es el nombre de la columna en la tabla departamentos que se utiliza como llave primaria, en este caso id
        return $this->belongsTo(Departamento::class, 'IdDepartamento', 'IdDepartamento');
    }



    /**
     * Relación uno a muchos con la tabla de puestos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function puesto()
    {
        // El modelo con el que se relaciona es Puesto
        // El segundo argumento es el nombre de la columna en la tabla users que hace referencia al puesto, en este caso IdPuesto
        // El tercer argumento es el nombre de la columna en la tabla puestos que se utiliza como llave primaria, en este caso IdPuesto
        return $this->belongsTo(Puesto::class, 'IdPuesto', 'IdPuesto');
    }
}
