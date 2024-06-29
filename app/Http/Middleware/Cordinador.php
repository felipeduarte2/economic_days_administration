<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cordinador
{
    /**
     * Método que maneja una solicitud HTTP.
     *
     * Este método verifica si el usuario autenticado es coordinador,
     * si es así, pasa la solicitud a la siguiente capa de middleware,
     * de lo contrario aborta la solicitud con un código de error 401 (No autorizado).
     *
     * @param  \Illuminate\Http\Request  $request La solicitud HTTP.
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next La siguiente capa de middleware.
     * @return \Symfony\Component\HttpFoundation\Response La respuesta generada por la siguiente capa de middleware.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario autenticado es coordinador
        if (auth()->user()->puesto->Descripcion == 'Cordinador') {
            // Si es coordinador, pasar la solicitud a la siguiente capa de middleware
            return $next($request);
        }
        // Si no es coordinador, abortar la solicitud con un código de error 401
        abort(401);
    }
}
