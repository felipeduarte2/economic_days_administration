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
     * Determina si el usuario está autorizado para realizar esta solicitud.
     *
     * @return bool
     */
    // Esta función se encarga de verificar si el usuario está autorizado para
    // realizar la solicitud. En este caso, se devuelve siempre `true` para
    // permitir que el usuario acceda al formulario de inicio de sesión.
    //
    // @return bool
    public function authorize(): bool
    {
        return true;
    }





    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    // Funcion para validar el formulario de inicio de sesión.
    //
    // Esta función devuelve un array de reglas de validación que se aplican a
    // los campos del formulario. En este caso, se validan los campos
    // 'Codigo_empleado', 'status' y 'password'.
    //
    // Los campos 'Codigo_empleado' y 'status' se deben haber introducido y
    // tienen un valor válido. El campo 'Codigo_empleado' debe ser una cadena
    // de texto de máximo 10 caracteres. El campo 'status' debe tener un
    // valor igual a 'Activo'.
    //
    // El campo 'password' se debe haber introducido y debe ser una cadena
    // de texto.
    //
    // @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
    public function rules(): array
    {
        return [
            'Codigo_empleado' => [ // Validación del campo 'Codigo_empleado'
                'required', // El campo es requerido
                'string', // El campo debe ser una cadena de texto
                'max:10', // El campo debe tener un máximo de 10 caracteres
            ],
            'status' => [ // Validación del campo 'status'
                'required', // El campo es requerido
                'string', // El campo debe ser una cadena de texto
                'in:Activo', // El campo debe tener un valor igual a 'Activo'
            ],
            'password' => [ // Validación del campo 'password'
                'required', // El campo es requerido
                'string', // El campo debe ser una cadena de texto
            ],
        ];
    }





    /**
     * Intente autenticar al usuario utilizando las credenciales proporcionadas.
     *
     * Si la autenticación es exitosa, el usuario será redirigido al destino previsto. Si hay un
     * error durante la autenticación, el usuario será redirigido nuevamente a la vista de inicio de sesión con los errores.
     *
     * @throws \Illuminate\Validation\ValidationException Si la autenticación falla
     */
    public function authenticate(): void
    {
        // Asegúrate de que el usuario no tenga una tarifa limitada
        $this->ensureIsNotRateLimited();

        // Intenta autenticar al usuario utilizando las credenciales proporcionadas
        if (! Auth::attempt($this->only('Codigo_empleado', 'password', 'status'), $this->boolean('remember'))) {
            // Si la autenticación falla, incrementa los intentos de inicio de sesión para este usuario
            RateLimiter::hit($this->throttleKey());

            // Lanza una ValidationException con el mensaje de inicio de sesión fallido
            throw ValidationException::withMessages([
                'Codigo_empleado' => trans('auth.failed'),
            ]);
        }

        // Si el usuario está autenticado, borra los intentos de inicio de sesión de este usuario
        RateLimiter::clear($this->throttleKey());
    }






    /**
     * Asegúrarse de que la solicitud de inicio de sesión no esté limitada por la velocidad.
     *
     * Si la cantidad de intentos de inicio de sesión excede el límite permitido, se lanza una excepción de validación
     * con un mensaje de error correspondiente.
     *
     * @throws \Illuminate\Validation\ValidationException Si la autenticación falla
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

        // Lanzar una excepción de validación con un mensaje de error correspondiente
        throw ValidationException::withMessages([
            'Codigo_empleado' => trans('auth.throttle', [
                'seconds' => $seconds,  // Número de segundos restantes hasta que el límite de intentos se resetee
                'minutes' => ceil($seconds / 60),  // Número de minutos restantes hasta que el límite de intentos se resetee
            ]),
        ]);
    }





    /**
     * Obtener la clave de aceleración de limitación de velocidad para la solicitud.
     *
     * @return string La clave de limitación de velocidad
     */
    /**
     * Obtener la clave de limite de intentos de inicio de sesión.
     *
     * La clave se obtiene combinando el código de empleado del usuario
     * con la dirección IP desde la que se está intentando iniciar sesión.
     *
     * @return string La clave de limitación de intentos de inicio de sesión
     */
    public function throttleKey(): string
    {
        // Transliterar caracteres especiales
        // Convertir el código de empleado a minúsculas
        // Agregar la dirección IP
        return Str::transliterate(Str::lower($this->string('Codigo_empleado'))) . '|' . $this->ip();
    }
}
