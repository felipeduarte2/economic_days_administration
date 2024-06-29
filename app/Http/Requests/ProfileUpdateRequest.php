<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    // Esta función realiza la validación de los campos del formulario
    // de actualización de perfil de usuario.
    //
    // @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
    //         Un arreglo con las reglas de validación.
    public function rules(): array
    {
        return [
            // Valida que el campo 'Codigo_empleado' sea requerido,
            // sea un string y tenga un máximo de 10 caracteres,
            // y que sea único en la tabla 'users' excepto para el
            // usuario autenticado.
            'Codigo_empleado' => [
                'required', 'string', 'max:10',
                Rule::unique('users', 'Codigo_empleado')->ignore($this->user()->id),
            ],

            // Valida que el campo 'Nombre' sea requerido,
            // sea un string y tenga un máximo de 255 caracteres.
            'Nombre' => ['required', 'string', 'max:255'],

            // Valida que el campo 'ApellidoP' sea requerido,
            // sea un string y tenga un máximo de 255 caracteres.
            'ApellidoP' => ['required', 'string', 'max:255'],

            // Valida que el campo 'ApellidoM' sea requerido,
            // sea un string y tenga un máximo de 255 caracteres.
            'ApellidoM' => ['required', 'string', 'max:255'],

            // Valida que el campo 'email' sea requerido,
            // sea un string, en minúscula, un email y tenga un máximo de 255 caracteres,
            // y que sea único en la tabla 'users' excepto para el
            // usuario autenticado.
            'email' => [
                'required', 'string', 'lowercase', 'email', 'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
        ];
    }
}
