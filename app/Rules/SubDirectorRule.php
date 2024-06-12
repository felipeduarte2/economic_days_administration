<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SubDirectorRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        
        // Consultar si hay un usuario con el IdPuesto 3 y estatus Activo
        $subdirector = User::where('IdPuesto', 3)->where('status', 'Activo')->first();

        // si $value es igual a 3 y si exite $subdirector, entonces no puede existir un subdirector
        if ($value == 3 && $subdirector) {
            $fail('Ya existe un SubDirector');
        }
    }
}
