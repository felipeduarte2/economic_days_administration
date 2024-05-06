<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudP extends Model
{
    use HasFactory;

    protected $table = "solicitud_pases_de_salida";

    protected $fillable = [
        'Motivo',
        'FechaSolicitud',
        'FechaSolicitada',
        'HoraSolicitada',
        'Observaciones',
        'user_id',
        'IdPeriodo',
    ];
}
