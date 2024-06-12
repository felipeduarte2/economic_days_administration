<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DirectorRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Consultar si hay un usuario con el IdPuesto 2 y estatus Activo
        $director = User::where('IdPuesto', 2)->where('status', 'Activo')->first();

        // si $value es igual a 2 y si exite $director, entonces no puede existir un director
        if ($value == 2 && $director) {
            $fail('Ya existe un director');
        }
    }
}
