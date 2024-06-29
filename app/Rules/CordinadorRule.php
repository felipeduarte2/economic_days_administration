<?php

namespace App\Rules;

use App\Models\Puesto;
use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class CordinadorRule implements DataAwareRule, ValidationRule
{

    /**
     * Todos los datos bajo validación.
     *
     * @var array<string, mixed>
     */
    protected $data = [];





    /**
     * Ejecuta la regla de validación.
     *
     * @param  string  $attribute El nombre del atributo.
     * @param  mixed  $value El valor del atributo.
     * @param  \Closure(\Illuminate\Translation\PotentiallyTranslatedString)  $fail Función de fallback.
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Inicializar la variable a null
        $cordinador = null;

        // Consultar el puesto basado en el IdPuesto
        $puesto = Puesto::where('IdPuesto', $this->data['IdPuesto'])->first();

        // Verificar si el atributo id está establecido
        if (isset($this->data['id'])) {
            // Consultar el usuario con el puesto como coordinador, departamento igual al valor de entrada y id diferente al id del usuario actual
            $cordinador = User::whereHas('puesto', fn ($query) => $query->where('Descripcion', 'Cordinador'))
            ->where('status', 'Activo')->where('IdDepartamento', $value)->where('id', '!=', $this->data['id'])->first();
        }else{
            // Consultar el usuario con el puesto como coordinador y departamento igual al valor de entrada
            $cordinador = User::whereHas('puesto', fn ($query) => $query->where('Descripcion', 'Cordinador'))
            ->where('status', 'Activo')->where('IdDepartamento', $value)->first();
        }

        // Verificar si el puesto es coordinador y existe un coordinador en el departamento
        if ($puesto->Descripcion == 'Cordinador' && $cordinador) {
            // Obtener el nombre del departamento en minúsculas
            $departamento = strtolower($cordinador->departamento->Descripcion);
            // Llamar al fallback y mostrar el mensaje de error
            $fail("Ya existe un coordinador en el departamento de $departamento");
        }
    }





    /**
     * Establece los datos bajo validación.
     *
     * @param  array<string, mixed>  $data Los datos bajo validación.
     * @return static Devuelve la instancia actual para encadenar llamadas.
     */
    public function setData(array $data): static
    {
        // Asigna los datos bajo validación al atributo data.
        $this->data = $data;

        // Devuelve la instancia actual para encadenar llamadas.
        return $this;
    }
}
