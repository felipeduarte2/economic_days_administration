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

    /**
     * Relación uno a muchos con la tabla de usuarios.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        // Retorna el usuario que ha realizado la solicitud de pase de salida.
        return $this->belongsTo(User::class);
    }



    /**
     * Relación uno a muchos con la tabla de periodos.
     *
     * Esta relación devuelve el período al que pertenece la solicitud de pase de salida.
     * Se utiliza el método `belongsTo` de Eloquent para establecer la relación.
     * El primer parámetro es la clase del modelo al que se relaciona, en este caso `Periodo`.
     * El segundo parámetro es el nombre de la columna en esta tabla que hace referencia al modelo `Periodo`, en este caso 'IdPeriodo'.
     * El tercer parámetro es el nombre de la columna en el modelo `Periodo` que hace referencia a esta tabla, en este caso 'IdPeriodo'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'IdPeriodo', 'IdPeriodo');
    }
}
