<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
    /**
     * Muestra la vista de confirmación de contraseña.
     *
     * @return \Illuminate\View\View La vista de confirmación de contraseña.
     */
    // Funcion para mostrar la vista de confirmar contraseña
    public function show(): View
    {
        // Retorna la vista de confirmación de contraseña
        return view('auth.confirm-password');
    }





    /**
     * Confirma la contraseña del usuario.
     *
     * @param \Illuminate\Http\Request $request La solicitud HTTP.
     * @return \Illuminate\Http\RedirectResponse La respuesta de redireccionamiento.
     * @throws \Illuminate\Validation\ValidationException Si la contraseña no es válida.
     */
    // Función para confirmar la contraseña del usuario y redireccionar a la vista de dashboard
    public function store(Request $request): RedirectResponse
    {
        // Verifica si la contraseña del usuario es válida
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email, // Obtiene el email del usuario
            'password' => $request->password, // Obtiene la contraseña proporcionada por el usuario
        ])) {
            // Si la contraseña no es válida, lanza una excepción de validación
            throw ValidationException::withMessages([
                'password' => __('auth.password'), // Mensaje de error de validación de contraseña
            ]);
        }

        // Guarda en la sesión el tiempo de confirmación de la contraseña
        $request->session()->put('auth.password_confirmed_at', time());

        // Redirecciona al usuario a la vista de dashboard
        return redirect()->intended(route('dashboard', absolute: false));
    }
}
