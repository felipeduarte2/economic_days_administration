<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Administrador
{
    /**
     * Método que maneja una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request Solicitud entrante
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next Función de retorno
     * @return \Symfony\Component\HttpFoundation\Response Respuesta HTTP
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si el usuario autenticado es un administrador
        if (auth()->user()->puesto->Descripcion == 'Administrador') {
            // Si es un administrador, pasa la solicitud al siguiente middleware
            return $next($request);
        }

        // redirecionar a /dashboard
        return redirect('/dashboard');

        // Si no es un administrador, genera una respuesta de error 401 (No autorizado)
        // abort(401);
        // Se podría redirigir al usuario a otra ruta o retornar una respuesta JSON de error
        // return redirect('/');
        // return response()->json(['error' => 'Unauthorized'], 401);
    }
}
