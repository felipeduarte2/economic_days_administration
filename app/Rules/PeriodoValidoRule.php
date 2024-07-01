<?php

namespace App\Rules;

use App\Models\Periodo;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PeriodoValidoRule implements ValidationRule
{
    /**
     * Ejecuta la regla de validación.
     *
     * Esta función verifica si existe un período válido para la fecha ingresada.
     * Para ello, se busca en la base de datos un período donde la fecha de inicio
     * sea menor o igual a la fecha ingresada y la fecha de fin sea mayor o igual a
     * la fecha ingresada. Si no se encuentra un período válido, se muestra un
     * mensaje de error.
     *
     * @param  string  $attribute Nombre del atributo
     * @param  mixed   $value     Valor del atributo
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail Callback para agregar un mensaje de error
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        // Convertir $value en formato Y-m-d
        $value = Carbon::parse($value)->format('Y-m-d');
        
        // Buscar un período válido para la fecha ingresada
        $periodo = Periodo::where('fecha_inicio', '<=', $value)
            ->where('fecha_fin', '>=', $value)
            ->first();

        // Si no se encontró un período válido, mostrar un mensaje de error
        if (!$periodo) {
            $fail('No se encontró un período válido para la fecha');
        }
    }
}
