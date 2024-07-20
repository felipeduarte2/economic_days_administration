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

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }



}
