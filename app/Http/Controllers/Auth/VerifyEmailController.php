<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Marca la dirección de correo electrónico del usuario autenticado como verificada.
     *
     * @param EmailVerificationRequest $request La solicitud de verificación de correo electrónico.
     * @return RedirectResponse La respuesta de redirección.
     */
    // Funcion para verificar el correo electronico del usuario y redireccionar a la vista de dashboard
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        // Si la dirección de correo electrónico del usuario ya está verificada, redirecciona a la vista de dashboard
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        }

        // Marca la dirección de correo electrónico del usuario como verificada y dispara el evento "Verified"
        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        // Redirecciona a la vista de dashboard
        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
    }

}
