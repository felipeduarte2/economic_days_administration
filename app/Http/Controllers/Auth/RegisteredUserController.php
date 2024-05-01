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
     * Mostrar la vista de registro.
     */

    // Funcion para mostrar la vista de registro
    public function create(): View
    {
        $puestos = Puesto::all();
        $departamentos = Departamento::all();
        return view('auth.register', compact('puestos', 'departamentos'));
        //return view('auth.register');
    }

    /**
     * Manejar una solicitud de registro entrante.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    // Funcion para procesar el formulario de registro de usuario y redireccionar a la vista de dashboard
    public function store(Request $request): RedirectResponse
    {
        // Validamos el formulario 
        $request->validate([
            'Codigo_empleado' => ['required', 'digits:6', 'unique:'.User::class],
            'Nombre' => ['required', 'string', 'max:255'],
            'ApellidoP' => ['required', 'string', 'max:255'],
            'ApellidoM' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Creamos el usuario
        $user = User::create([
            'Codigo_empleado' => $request->Codigo_empleado,
            'Nombre' => $request->Nombre,
            'ApellidoP' => $request->ApellidoP,
            'ApellidoM' => $request->ApellidoM,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'IdDepartamento' => $request->IdDepartamento,
            'IdPuesto' => $request->IdPuesto,
        ]);

        // Enviamos un evento de registro
        event(new Registered($user));

        // Logueamos al usuario
        Auth::login($user);

        // Redireccionamos a la vista de dashboard
        return redirect(route('dashboard', absolute: false));
    }
}
