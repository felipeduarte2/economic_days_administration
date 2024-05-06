<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Administrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->puesto->Descripcion == 'Administrador') {
            return $next($request);
        }
        // return $next($request);
        abort(401);
        //return redirect('/');
        // return response()->json(['error' => 'Unauthorized'], 401);
    }
}
