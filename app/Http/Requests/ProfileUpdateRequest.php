<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Obtenga las reglas de validación que se aplican a la solicitud. 
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */

    // Funcion para validar el formulario de actualizacion de perfil de usuario 
    public function rules(): array
    {
        return [
            'Codigo_empleado' => ['required', 'digits:6', Rule::unique('users', 'Codigo_empleado')->ignore($this->user()->id)],
            'Nombre' => ['required', 'string', 'max:255'],
            'ApellidoP' => ['required', 'string', 'max:255'],
            'ApellidoM' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
