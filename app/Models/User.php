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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function departamento(){
        return $this->belongsTo(Departamento::class, 'IdDepartamento', 'IdDepartamento');
    }

    public function puesto(){
        return $this->belongsTo(Puesto::class, 'IdPuesto', 'IdPuesto');
    }

    // protected function name(): Attribute
    // {
    //     return new Attributes(
    //         set: fn ($value) => ucwords($value),
    //         get: fn ($value) => strtolower($value)
    //     );
    // }
}
