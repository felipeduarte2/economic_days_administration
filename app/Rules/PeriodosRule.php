<?php

namespace App\Rules;

use App\Models\Periodo;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PeriodosRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $value = Carbon::parse($value)->format('Y-m-d');

        $value = Periodo::where('fecha_inicio', '<=', $value)
            ->where('fecha_fin', '>=', $value)
            ->first();

        if ($value) {
            $fail('Ya existe un periodo para esa fecha');
        }

        // $periodo = Periodo::where('fecha_inicio', '<=', $value)
        //     ->where('fecha_fin', '>=', $value)
        //     ->first();

        // if ($periodo) {
        //     $fail('Ya existe un periodo para esa fecha');
        // }
    }
}
