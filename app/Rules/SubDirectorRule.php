<?php

namespace App\Rules;

use App\Models\Puesto;
use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class SubDirectorRule implements DataAwareRule, ValidationRule
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
        $subdirector = null;

        // Consultar el puesto basado en el IdPuesto
        $puesto = Puesto::where('IdPuesto', $value)->first();

        // Si el atributo id está establecido, buscar un usuario con el puesto de subdirector
        // y un estado activo que no sea el mismo que el usuario actual
        if (isset($this->data['id'])) {
            $subdirector = User::
            whereHas('puesto', fn ($query) => $query->where('Descripcion', 'SubDirector'))
            ->where('status', 'Activo')
            ->where('id', '!=', $this->data['id'])
            ->first();
        } else { // Si no, buscar un usuario con el puesto de subdirector y un estado activo
            $subdirector = User::
            whereHas('puesto', fn ($query) => $query->where('Descripcion', 'SubDirector'))
            ->where('status', 'Activo')
            ->first();
        }

        // Si el puesto es subdirector y existe un subdirector activo, llamar al fallback
        // y mostrar el mensaje de error
        if ($puesto->Descripcion == 'SubDirector' && $subdirector) {
            $fail('Ya existe un SubDirector');
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
        // Establece los datos bajo validación en el atributo data.
        $this->data = $data;

        // Devuelve la instancia actual para encadenar llamadas.
        return $this;
    }
}
