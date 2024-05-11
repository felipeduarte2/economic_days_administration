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
     */

    //funcion para mostrar la vista de login
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Manejar una solicitud de autenticación entrante.
     */

    // funcion para autenticar al usuario y redireccionar a la vista de dashboard
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        //redireccionar a la vista de dashboard

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

        else{
            return redirect()->intended(route('dashboard', absolute: false));
        }
    }

    /**
     * Destruye una sesión autenticada.
     */

    //funcion para cerrar sesion del usuario y redireccionar a la vista de login
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
