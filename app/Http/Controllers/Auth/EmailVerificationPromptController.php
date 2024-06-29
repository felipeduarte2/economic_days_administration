<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Muestra el mensaje de verificación de correo electrónico.
     *
     * @param \Illuminate\Http\Request $request La solicitud HTTP.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View La respuesta de redireccionamiento o la vista.
     */
    // Función para mostrar el mensaje de verificación de correo electrónico.
    public function __invoke(Request $request): RedirectResponse|View
    {
        // Verifica si el correo electrónico del usuario ha sido verificado.
        return $request->user()->hasVerifiedEmail()
            // Si el correo electrónico ha sido verificado, redirecciona al usuario a la vista de dashboard.
            ? redirect()->intended(route('dashboard', absolute: false))
            // Si no ha sido verificado, muestra la vista de verificación de correo electrónico.
            : view('auth.verify-email');
    }
}
