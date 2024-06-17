<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SolicitudD;
use App\Models\SolicitudP;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    //
    public function dashboard(): View
    {
        // Todas las solicitudes_p y solicitudes_d que se pagine por 5 registros y ordenar por el mas reciente primero
        $solicitudes_p = SolicitudP::orderBy('created_at', 'desc')->paginate(5);
        $solicitudes_d = SolicitudD::orderBy('created_at', 'desc')->paginate(5);
        return view('director.dashboard', compact('solicitudes_p', 'solicitudes_d'));
    }

    public function create_detalles_solicitud_d(SolicitudD $solicitud): View
    {
        return view('director.detalles_solicitud_dias_ecoconimicos', compact('solicitud'));
    }

    public function update_accept_solicitud_d(SolicitudD $solicitud, Request $request):RedirectResponse
    {
        // cambiamos validacion1 por true
        $solicitud->Validacion1 = true;

        // si $solicitud->Validacion1 y 2 es true
        if ($solicitud->Validacion1 && $solicitud->Validacion2 && $solicitud->Validacion3) {
            $solicitud->Aprobacion = true;
        } elseif (!$solicitud->Validacion1 || !$solicitud->Validacion2 || !$solicitud->Validacion3){
            $solicitud->Aprobacion = false;
        }else { $solicitud->Aprobacion = null;}

        // guardamos en la base de datos Validacion1
        $solicitud->save(); 

        // redirecionamos a dashboard
        return redirect()->route('director.dashboard');
    }

    public function update_reject_solicitud_d(SolicitudD $solicitud, Request $request):RedirectResponse
    {
        // cambiamos validacion1 por false
        $solicitud->Validacion1 = false;

        // si $solicitud->Validacion1 y 2 es true
        if ($solicitud->Validacion1 && $solicitud->Validacion2 && $solicitud->Validacion3) {
            $solicitud->Aprobacion = true;
        } elseif (!$solicitud->Validacion1 || !$solicitud->Validacion2 || !$solicitud->Validacion3){
            $solicitud->Aprobacion = false;
        }else { $solicitud->Aprobacion = null;}

        // guardamos en la base de datos Validacion1
        $solicitud->save();

        // redirecionamos a dashboard
        return redirect()->route('director.dashboard');
    }

    public function create_detalles_solicitud_p(SolicitudP $solicitud): View
    {
        return view('director.detalles_solicitud_pases_de_salida', compact('solicitud'));
    }

    public function update_accept_solicitud_p(SolicitudP $solicitud, Request $request):RedirectResponse
    {
        // cambiamos validacion1 por true
        $solicitud->Validacion1 = true;

        // si $solicitud->Validacion1 y 2 es true
        if ($solicitud->Validacion1 && $solicitud->Validacion2 && $solicitud->Validacion3) {
            $solicitud->Aprobacion = true;
        } elseif (!$solicitud->Validacion1 || !$solicitud->Validacion2 || !$solicitud->Validacion3){
            $solicitud->Aprobacion = false;
        }else { $solicitud->Aprobacion = null;}

        // guardamos en la base de datos Validacion1
        $solicitud->save();

        // redirecionamos a dashboard
        return redirect()->route('director.dashboard');
    }

    public function update_reject_solicitud_p(SolicitudP $solicitud, Request $request):RedirectResponse
    {
        // cambiamos validacion1 por false
        $solicitud->Validacion1 = false;

        // si $solicitud->Validacion1 y 2 es true
        if ($solicitud->Validacion1 && $solicitud->Validacion2 && $solicitud->Validacion3) {
            $solicitud->Aprobacion = true;
        } elseif (!$solicitud->Validacion1 || !$solicitud->Validacion2 || !$solicitud->Validacion3){
            $solicitud->Aprobacion = false;
        }else { $solicitud->Aprobacion = null;}

        // guardamos en la base de datos Validacion1
        $solicitud->save();

        // redirecionamos a dashboard
        return redirect()->route('director.dashboard');
    }
}
