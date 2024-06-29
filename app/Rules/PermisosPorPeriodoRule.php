<?php

namespace App\Rules;

use App\Models\Periodo;
use App\Models\SolicitudD;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PermisosPorPeriodoRule implements ValidationRule
{
    /**
     * Ejecuta la regla de validación.
     *
     * Esta función valida que el usuario no tenga más de tres solicitudes
     * por período. Para ello, se obtiene el período correspondiente a la fecha
     * ingresada y luego se buscan todas las solicitudes del usuario para ese
     * período. Si hay más de tres solicitudes, se muestra un mensaje de error.
     *
     * @param  string  $attribute Nombre del atributo
     * @param  mixed   $value     Valor del atributo
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail Callback para agregar un mensaje de error
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Inicializar la variable de solicitudes
        $solicitudes = null;

        // Convertir $value en formato Y-m-d
        $value = Carbon::parse($value)->format('Y-m-d');

        // Obtener el período correspondiente a la fecha ingresada
        $periodo = Periodo::where('fecha_inicio', '<=', $value)
            ->where('fecha_fin', '>=', $value)
            ->first();

        if ($periodo) {
            // $fail('No se encontró un día válido para la fecha');

            // Consultar todas las solicitudes del usuario para ese período
            $solicitudes = SolicitudD::where('user_id', auth()->user()->id)
            ->where('IdPeriodo', $periodo->IdPeriodo)
            ->get();

            // Si hay más de tres solicitudes, mostrar un mensaje de error
            if ($solicitudes->count() >= 3) {
                $fail('Solo puede tener 3 solicitudes por período');
            }
        }

        // Si no se encontró un día válido para la fecha, mostrar un mensaje de error
        if (!$periodo) {
            $fail('No se encontró un período válido para la fecha');
        }
    }
}
