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
        'Observaciones',
        'user_id',
        'IdPeriodo',
    ];

    
}
