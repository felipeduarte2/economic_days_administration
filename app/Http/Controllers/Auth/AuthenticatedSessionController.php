<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{

    /**
     * Muestra la vista de inicio de sesión.
     *
     * @return \Illuminate\View\View La vista de inicio de sesión.
     */
    //funcion para mostrar la vista de login
    public function create(): View
    {
        // Retorna la vista de inicio de sesión.
        return view('auth.login');
    }





    /**
     * Maneja una solicitud de autenticación entrante.
     *
     * @param LoginRequest $request La solicitud de autenticación.
     * @return RedirectResponse La respuesta de redirección.
     */
    // Función para autenticar al usuario y redireccionar a la vista de dashboard
    public function store(LoginRequest $request): RedirectResponse
    {
        // Autentica al usuario
        $request->authenticate();

        // Regenera la sesión
        $request->session()->regenerate();

        // Redirecciona al usuario a la vista de dashboard correspondiente a su puesto

        // Docente
        if($request->user()->puesto->Descripcion === 'Docente'){
            return redirect()->intended(route('docente.dashboard', absolute: false));
        }

        // Cordinador
        elseif($request->user()->puesto->Descripcion === 'Cordinador'){
            return redirect()->intended(route('cordinador.dashboard', absolute: false));
        }

        // Administrador
        elseif($request->user()->puesto->Descripcion === 'Administrador'){
            return redirect()->intended(route('administrador.dashboard', absolute: false));
        }

        // Director
        elseif($request->user()->puesto->Descripcion === 'Director'){
            return redirect()->intended(route('director.dashboard', absolute: false));
        }

        // SubDirector
        elseif($request->user()->puesto->Descripcion === 'SubDirector'){
            return redirect()->intended(route('subdirector.dashboard', absolute: false));
        }

        // Si ninguna de las condiciones anteriores se cumple, redirecciona al usuario a la vista de dashboard general
        else{
            return redirect()->intended(route('dashboard', absolute: false));
        }
    }






    /**
     * Cierra una sesión autenticada y redirecciona al usuario a la vista de inicio de sesión.
     *
     * @param  \Illuminate\Http\Request  $request La solicitud HTTP.
     * @return \Illuminate\Http\RedirectResponse La respuesta de redirección.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Cierra la sesión del usuario autenticado.
        Auth::guard('web')->logout();

        // Invalida la sesión actual del usuario.
        $request->session()->invalidate();

        // Regenera el token de la sesión actual.
        $request->session()->regenerateToken();

        // Redirecciona al usuario a la vista de inicio de sesión.
        return redirect('/');
    }
}
