<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class SubDirectorRule implements DataAwareRule, ValidationRule
{

    /**
     * All of the data under validation.
     *
     * @var array<string, mixed>
     */
    protected $data = [];

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $subdirector = null;

        if (isset($this->data['id'])) {
            $subdirector = User::where('IdPuesto', 3)->where('status', 'Activo')->where('id', '!=', $this->data['id'])->first();
        }else{
            $subdirector = User::where('IdPuesto', 3)->where('status', 'Activo')->first();
        }

        // // Consultar si hay un usuario con el IdPuesto 3 y estatus Activo y y que ignore al user con Codigo_empleado igual a data['Codigo_empleado']
        // if ($this->data['id'] == 0) {
        //     $subdirector = User::where('IdPuesto', 3)->where('status', 'Activo')->first();
        // }else{
        //     $subdirector = User::where('IdPuesto', 3)->where('status', 'Activo')->where('id', '!=', $this->data['id'])->first();
        // }

        // si $value es igual a 3 y si exite $subdirector, entonces no puede existir un subdirector
        if ($value == 3 && $subdirector) {
            $fail('Ya existe un SubDirector');
        }
    }

    /**
     * Set the data under validation.
     *
     * @param  array<string, mixed>  $data
     */
    public function setData(array $data): static
    {
        $this->data = $data;

        return $this;
    }
}
