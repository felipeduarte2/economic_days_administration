<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudD extends Model
{
    use HasFactory;

    protected $table = "solicitud_dias_ecoconimicos";

    protected $fillable = [
        'Motivo',
        'FechaSolicitud',
        'FechaSolicitada',
        'Validacion1',
        'Validacion2',
        'Validacion3',
        'FechaValida1',
        'FechaValida2',
        'FechaValida3',
        'Aprobacion',
        'Cancelacion',
        'Observaciones',
        'user_id',
        'IdPeriodo',
    ];

}
