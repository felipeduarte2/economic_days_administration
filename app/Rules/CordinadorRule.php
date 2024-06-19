<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class CordinadorRule implements DataAwareRule, ValidationRule
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
        $cordinador = null;

        if (isset($this->data['id'])) {
            $cordinador = User::where('IdPuesto', 4)->where('status', 'Activo')->where('IdDepartamento', $value)->where('id', '!=', $this->data['id'])->first();
        }else{
            $cordinador = User::where('IdPuesto', 4)->where('status', 'Activo')->where('IdDepartamento', $value)->first();
        }

        // Consultar si hay un usuario con el IdPuesto, y estatus Activo y IdDepartamento sea igual a value y que ignore al user con Codigo_empleado igual a data['Codigo_empleado']
        // $cordinador = User::where('IdPuesto', 4)->where('status', 'Activo')->where('IdDepartamento', $value)->first();

        // si IdPuesto de data es igual a 4 y si exite $cordinador, entonces no puede existir un cordinador
        if ($this->data['IdPuesto'] == 4 && $cordinador) {
            // poner $cordinador->departamento->Descripcion en minuscula
            $departamento = strtolower($cordinador->departamento->Descripcion);
            $fail("Ya existe un coordinador en el departamento de $departamento");
            // $fail('Ya existe un cordinador en '. $cordinador->departamento->Descripcion );
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
