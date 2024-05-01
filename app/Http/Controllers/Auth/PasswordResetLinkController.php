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
     */

    // Funcion para mostrar la vista de recuperar contraseña
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Manejar una solicitud de enlace de restablecimiento de contraseña entrante.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    // Funcion para procesar el formulario de recuperar contraseña
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Enviaremos el enlace para restablecer la contraseña a este usuario. Una vez que hemos intentado
        // para enviar el enlace, examinaremos la respuesta y luego veremos el mensaje que
        // necesito mostrárselo al usuario. Finalmente, enviaremos una respuesta adecuada.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
}
