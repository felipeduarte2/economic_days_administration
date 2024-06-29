<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Actualiza la contraseña del usuario.
     *
     * @param Request $request La solicitud HTTP que contiene los datos de la contraseña actual y la nueva contraseña.
     *
     * @return RedirectResponse La respuesta que redirecciona al usuario a la página anterior con un mensaje de estado.
     */
    public function update(Request $request): RedirectResponse
    {
        // Valida los datos de la contraseña actual y la nueva contraseña
        $validated = $request->validateWithBag('updatePassword', [
            // La contraseña actual es obligatoria y debe ser correcta
            'current_password' => ['required', 'current_password'],
            // La nueva contraseña debe cumplir con las reglas de seguridad de la aplicación
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        // Actualiza la contraseña del usuario
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        // Redirecciona al usuario a la página anterior con un mensaje de estado
        return back()->with('status', 'password-updated');
    }
}
