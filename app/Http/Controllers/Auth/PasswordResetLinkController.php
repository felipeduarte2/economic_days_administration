<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Muestra la vista de solicitud de enlace de restablecimiento de contraseña.
     *
     * @return \Illuminate\View\View La vista de solicitud de restablecimiento de contraseña.
     */
    // Funcion para mostrar la vista de recuperar contraseña
    public function create(): View
    {
        // Retorna la vista de solicitud de restablecimiento de contraseña.
        return view('auth.forgot-password');
    }






    /**
     * Maneja una solicitud de enlace de restablecimiento de contraseña entrante.
     *
     * @param Request $request La solicitud HTTP entrante.
     * @throws \Illuminate\Validation\ValidationException Si la validación falla.
     * @return \Illuminate\Http\RedirectResponse La respuesta de redireccionamiento adecuada.
     */
    // Funcion para procesar el formulario de recuperar contraseña
    public function store(Request $request): RedirectResponse
    {
        // Validamos el campo "email" del formulario.
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Enviamos el enlace para restablecer la contraseña al usuario.
        // El método "sendResetLink" de la clase "Password" de Illuminate valida
        // si el usuario existe y genera un token para el usuario.
        // Luego, enviamos un correo electrónico con el enlace para restablecer la contraseña.
        // Si la operación se realiza correctamente, devolvemos una respuesta de redireccionamiento
        // con un mensaje de éxito. Si hay un error, devolvemos una respuesta de redireccionamiento
        // con un mensaje de error.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Determinamos la respuesta adecuada según el estado del envío del enlace.
        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status)) // En caso de éxito, mostramos un mensaje de éxito.
            : back()->withInput($request->only('email')) // En caso de error, mostramos el formulario con los datos ingresados.
                ->withErrors(['email' => __($status)]); // Y mostramos un mensaje de error.
    }
}
