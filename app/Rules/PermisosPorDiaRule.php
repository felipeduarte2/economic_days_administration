<?php

namespace App\Rules;

use App\Models\SolicitudD;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PermisosPorDiaRule implements ValidationRule
{
    /**
     * Ejecuta la regla de validación.
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

        // Consultar todas las solicitudes donde FechaSolicitada sea igual a $value
        $solicitudes = SolicitudD::where('FechaSolicitada', $value)->get();

        // Si hay más de tres solicitudes, mostrar un mensaje de error
        if ($solicitudes->count() >= 3) {
            // Mostrar que se han agotado las solicitudes para esa fecha
            $fail('Ya se alcanzó el límite de solicitudes para esta fecha.');
        }
    }
}
