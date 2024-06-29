<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Models\Puesto;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Muestra la vista de registro.
     *
     * @return \Illuminate\View\View Vista de registro
     */
    // Función para mostrar la vista de registro
    public function create(): View
    {
        // Obtener todos los puestos y departamentos
        // Para mostrarlos en la vista de registro
        $puestos = Puesto::all(); // Obtener todos los puestos
        $departamentos = Departamento::all(); // Obtener todos los departamentos

        // Retornar la vista de registro, pasando los puestos y departamentos como variables compact
        // Compact se utiliza para pasar variables a una vista de Laravel
        return view(
            'administrador.register', // Ruta de la vista de registro
            compact('puestos', 'departamentos') // Variables compact
        );
        //return view('auth.register');
    }





    /**
     * Maneja una solicitud de registro entrante.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // Función para procesar el formulario de registro de usuario y redireccionar a la vista de dashboard
    public function store(Request $request): RedirectResponse
    {
        // Validamos el formulario 
        // Validamos los campos del formulario de registro
        $request->validate([
            'Codigo_empleado' => ['required', 'string', 'max:10', 'unique:'.User::class], // Código de empleado es requerido, debe ser una cadena de texto y debe ser único en la tabla de usuarios
            'Nombre' => ['required', 'string', 'max:255'], // Nombre es requerido y debe ser una cadena de texto de máximo 255 caracteres
            'ApellidoP' => ['required', 'string', 'max:255'], // Apellido paterno es requerido y debe ser una cadena de texto de máximo 255 caracteres
            'ApellidoM' => ['required', 'string', 'max:255'], // Apellido materno es requerido y debe ser una cadena de texto de máximo 255 caracteres
            // 'name' => ['required', 'string', 'max:255'], // Nombre es requerido y debe ser una cadena de texto de máximo 255 caracteres
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class], // Email es requerido, debe ser una cadena de texto, estar en formato de email y debe ser único en la tabla de usuarios
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()], // Contraseña es requerida y debe cumplir con los requisitos de seguridad por defecto
        ]);

        // Creamos el usuario
        // Creamos un nuevo usuario en la base de datos a partir de los datos del formulario de registro
        $user = User::create([
            'Codigo_empleado' => $request->Codigo_empleado, // Asignamos el código de empleado del formulario
            'Nombre' => $request->Nombre, // Asignamos el nombre del formulario
            'ApellidoP' => $request->ApellidoP, // Asignamos el apellido paterno del formulario
            'ApellidoM' => $request->ApellidoM, // Asignamos el apellido materno del formulario
            // 'name' => $request->name, // Asignamos el nombre del formulario
            'email' => $request->email, // Asignamos el email del formulario
            // 'password' => Hash::make($request->password), // Hashamos la contraseña del formulario y la asignamos al usuario
            'password' => bcrypt($request->input('000000')), // Hashamos la contraseña "000000" y la asignamos al usuario
            'IdDepartamento' => $request->IdDepartamento, // Asignamos el id del departamento del formulario
            'IdPuesto' => $request->IdPuesto, // Asignamos el id del puesto del formulario
        ]);

        // Enviamos un evento de registro
        // Enviamos un evento de registro de usuario para que se puedan realizar acciones adicionales
        event(new Registered($user));

        // Logueamos al usuario
        // No se está logueando al usuario, se sigue redirigiendo a la vista de dashboard

        // Redireccionamos a la vista de dashboard
        // Redireccionamos al usuario a la vista de dashboard
        return redirect(route('dashboard', absolute: false));
    }
}
