<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determinar si el usuario está autorizado a realizar esta solicitud.
     */

    // funcion para verificar y autorizar la peticion 
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtener las reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */

    // Funcion para validar el formulario de login y redireccionar a la vista de dashboard
    public function rules(): array
    {
        return [
            'Codigo_empleado' => ['required', 'string', 'max:10'],
            'status' => ['required', 'string', 'in:Activo'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Intentar autenticar las credenciales de la solicitud.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    /**
     * Intente autenticar al usuario utilizando las credenciales proporcionadas.
     *
     * Si la autenticación es exitosa, el usuario será redirigido al destino previsto. Si hay un
     * error durante la autenticación, el usuario será redirigido nuevamente a la vista de inicio de sesión con los errores.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        /**
         * Asegúrar de que el usuario no tenga una tarifa limitada.
         */
        $this->ensureIsNotRateLimited();

        /**
         * Intentar autenticar al usuario utilizando las credenciales proporcionadas.
         */
        if (! Auth::attempt($this->only('Codigo_empleado', 'password', 'status'), $this->boolean('remember'))) {
            /**
             * Si la autenticación falla, incremente los intentos de inicio de sesión para este usuario.
             */
            RateLimiter::hit($this->throttleKey());

            /**
             * Lanza una ValidationException con el mensaje de inicio de sesión fallido.
             */
            throw ValidationException::withMessages([
                'Codigo_empleado' => trans('auth.failed'),
            ]);
        }

        /**
         * Si el usuario está autenticado, borre los intentos de inicio de sesión de este usuario.
         */
        RateLimiter::clear($this->throttleKey());
    }


    /**
     * Asegúrara de que la solicitud de inicio de sesión no tenga una tarifa limitada.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    /**
     * Verificar si la solicitud de inicio de sesión no tiene una tarifa limitada.
     *
     * Verificar si la solicitud de inicio de sesión no ha excedido el límite de intentos permitidos.
     * Si el límite de intentos se ha excedido, se lanza una ValidationException con el mensaje
     * de error correspondiente.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        // Verificar si el límite de intentos se ha excedido
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        // Disparar el evento de bloqueo
        event(new Lockout($this));

        // Obtener la cantidad de segundos restantes hasta que el límite de intentos se resetee
        $seconds = RateLimiter::availableIn($this->throttleKey());

        // Lanzar una ValidationException con el mensaje de error correspondiente
        throw ValidationException::withMessages([
            'Codigo_empleado' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }


    /**
     * Obtener la clave de aceleración de limitación de velocidad para la solicitud.
     */

    /**
     * Obtener la clave de limite de intentos de inicio de sesión.
     *
     * La clave se obtiene combinando la dirección de correo electrónico del usuario
     * con la dirección IP desde la que se está intentando iniciar sesión.
     *
     * @return string
     */
    public function throttleKey(): string
    {
        return Str::transliterate( // Transliterar caracteres especiales
            Str::lower($this->string('Codigo_empleado')) // Convertir a minúsculas
            . '|' . $this->ip() // Agregar la dirección IP
        );
    }
}
