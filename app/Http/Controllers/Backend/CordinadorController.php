<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\SolicitudD;
use App\Models\SolicitudP;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CordinadorController extends Controller
{
    //
    public function dashboard(): View
    {
        // traer todas las solicitudes_p cuando el user->departamento->IdDepartamento de las solicitudes_p sean igual al auth()->user()->departamento->id
        $solicitudes_p = SolicitudP::whereHas('user', function($query){
            $query->where('IdDepartamento', auth()->user()->IdDepartamento);
        })->latest()->paginate(5);

        // 
        $solicitudes_d = SolicitudD::whereHas('user', function($query){
            $query->where('IdDepartamento', auth()->user()->IdDepartamento);
        })->latest()->paginate(5);

        return view('cordinador.dashboard', compact('solicitudes_p', 'solicitudes_d'));
    }

    public function create_detalles_solicitud_d(SolicitudD $solicitud): View
    {
        return view('cordinador.detalles_solicitud_dias_ecoconimicos', compact('solicitud'));
    }

    public function update_accept_solicitud_d(SolicitudD $solicitud, Request $request):RedirectResponse
    {
        // cambiamos validacion3 por true
        $solicitud->Validacion3 = true;

        // si $solicitud->Validacion1 y 2 es true
        if ($solicitud->Validacion1 && $solicitud->Validacion2 && $solicitud->Validacion3) {
            $solicitud->Aprobacion = true;
        } elseif (!$solicitud->Validacion1 || !$solicitud->Validacion2 || !$solicitud->Validacion3){
            $solicitud->Aprobacion = false;
        }else { $solicitud->Aprobacion = null;}

        // guardamos en la base de datos Validacion3
        $solicitud->save(); 

        // redirecionamos a dashboard
        return redirect()->route('cordinador.dashboard');
    }

    public function update_reject_solicitud_d(SolicitudD $solicitud, Request $request):RedirectResponse
    {
        // cambiamos validacion3 por false
        $solicitud->Validacion3 = false;

        // si $solicitud->Validacion1 y 2 es true
        if ($solicitud->Validacion1 && $solicitud->Validacion2 && $solicitud->Validacion3) {
            $solicitud->Aprobacion = true;
        } elseif (!$solicitud->Validacion1 || !$solicitud->Validacion2 || !$solicitud->Validacion3){
            $solicitud->Aprobacion = false;
        }else { $solicitud->Aprobacion = null;}

        // guardamos en la base de datos Validacion3
        $solicitud->save();

        // redirecionamos a dashboard
        return redirect()->route('cordinador.dashboard');
    }

    public function create_detalles_solicitud_p(SolicitudP $solicitud): View
    {
        return view('cordinador.detalles_solicitud_pases_de_salida', compact('solicitud'));
    }

    public function update_accept_solicitud_p(SolicitudP $solicitud, Request $request):RedirectResponse
    {
        // cambiamos validacion3 por true
        $solicitud->Validacion3 = true;

        // si $solicitud->Validacion1 y 2 es true
        if ($solicitud->Validacion1 && $solicitud->Validacion2 && $solicitud->Validacion3) {
            $solicitud->Aprobacion = true;
        } elseif (!$solicitud->Validacion1 || !$solicitud->Validacion2 || !$solicitud->Validacion3){
            $solicitud->Aprobacion = false;
        }else { $solicitud->Aprobacion = null;}

        // guardamos en la base de datos Validacion3
        $solicitud->save();

        // redirecionamos a dashboard
        return redirect()->route('cordinador.dashboard');
    }

    public function update_reject_solicitud_p(SolicitudP $solicitud, Request $request):RedirectResponse
    {
        // cambiamos validacion3 por false
        $solicitud->Validacion3 = false;

        // si $solicitud->Validacion1 y 2 es true
        if ($solicitud->Validacion1 && $solicitud->Validacion2 && $solicitud->Validacion3) {
            $solicitud->Aprobacion = true;
        } elseif (!$solicitud->Validacion1 || !$solicitud->Validacion2 || !$solicitud->Validacion3){
            $solicitud->Aprobacion = false;
        }else { $solicitud->Aprobacion = null;}

        // guardamos en la base de datos Validacion3
        $solicitud->save();

        // redirecionamos a dashboard
        return redirect()->route('cordinador.dashboard');
    }
}
