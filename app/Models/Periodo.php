<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
    ];

    // public function users()
    // {
    //     return $this->hasMany(User::class);
    // }

    public function solicitudes_d()
    {
        return $this->hasMany(SolicitudD::class);
    }

    public function solicitudes_p()
    {
        return $this->hasMany(SolicitudP::class);
    }

}
