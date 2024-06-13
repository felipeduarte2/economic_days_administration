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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'IdPeriodo', 'IdPeriodo');
    }
}
