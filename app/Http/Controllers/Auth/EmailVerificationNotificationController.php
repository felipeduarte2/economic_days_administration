<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Envía una nueva notificación de verificación por correo electrónico.
     *
     * @param Request $request La solicitud HTTP.
     * @return RedirectResponse Redirecciona a la vista de dashboard si el usuario ya ha verificado su correo electrónico,
     * de lo contrario envía un nuevo correo de verificación al usuario y redirecciona a la vista anterior.
     */
    public function store(Request $request): RedirectResponse
    {
        // Verifica si el usuario ya ha verificado su correo electrónico
        if ($request->user()->hasVerifiedEmail()) {
            // Redirecciona a la vista de dashboard
            return redirect()->intended(route('dashboard', absolute: false));
        }

        // Envía un nuevo correo de verificación al usuario
        $request->user()->sendEmailVerificationNotification();

        // Redirecciona a la vista anterior con un mensaje de estado
        return back()->with('status', 'verification-link-sent');
    }
}
