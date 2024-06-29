<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Director
{
    /**
     * Método que maneja una solicitud entrante.
     * Verifica si el usuario autenticado es un director.
     * Si es así, pasa la solicitud al siguiente middleware.
     * De lo contrario, genera una respuesta de error 401 (No autorizado).
     *
     * @param  \Illuminate\Http\Request  $request Solicitud entrante
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next Función de retorno
     * @return \Symfony\Component\HttpFoundation\Response Respuesta HTTP
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si el usuario autenticado es un director
        if (auth()->user()->puesto->Descripcion == 'Director') {
            // Si es un director, pasa la solicitud al siguiente middleware
            return $next($request);
        }
        // Si no es un director, genera una respuesta de error 401 (No autorizado)
        abort(401);
    }
}
