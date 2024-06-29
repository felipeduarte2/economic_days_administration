<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Muestra la vista de restablecimiento de contraseña.
     *
     * @param  Request  $request La solicitud entrante.
     * @return View La vista para restablecer la contraseña.
     */
    // Muestra la vista para restablecer la contraseña del usuario a la que ha solicitado 
    public function create(Request $request): View
    {
        // Retorna la vista para restablecer la contraseña, pasando la solicitud como variable compact.
        return view('auth.reset-password', ['request' => $request]);
    }





    /**
     * Maneja una solicitud entrante de nueva contraseña.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // Función para restablecer la contraseña del usuario a la que ha solicitado 
    public function store(Request $request): RedirectResponse
    {
        // Validamos los datos de la solicitud entrante
        $request->validate([
            'token' => ['required'], // Token requerido
            'email' => ['required', 'email'], // Correo electrónico requerido y debe ser un correo válido
            'password' => ['required', 'confirmed', Rules\Password::defaults()], // Contraseña requerida y debe ser válida
        ]);

        // Intenta restablecer la contraseña del usuario
        // Si tiene éxito actualizamos la contraseña en el modelo de usuario y la guardamos en la base de datos
        // De lo contrario, analizamos el error y devolvemos la respuesta
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password), // Ciframos la contraseña
                    'remember_token' => Str::random(60), // Generamos un token aleatorio para recordar al usuario
                ])->save();

                event(new PasswordReset($user)); // Disparamos el evento de restablecimiento de contraseña
            }
        );

        // Si la contraseña se restableció exitosamente, redirigimos al usuario de regreso a la página de inicio de la aplicación
        // Si hay un error, redirigimos al usuario de regreso con un mensaje de error
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
}
