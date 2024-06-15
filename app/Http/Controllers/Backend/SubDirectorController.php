<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SolicitudD;
use App\Models\SolicitudP;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SubDirectorController extends Controller
{
    //
    public function dashboard(){
        // Todas las solicitudes_p y solicitudes_d que se pagine por 8 registros y ordenar por el mas reciente primero
        $solicitudes_p = SolicitudP::orderBy('created_at', 'desc')->paginate(8);
        $solicitudes_d = SolicitudD::orderBy('created_at', 'desc')->paginate(8);
        return view('subdirector.dashboard', compact('solicitudes_p', 'solicitudes_d'));
    }

    public function create_detalles_solicitud_d(SolicitudD $solicitud): View
    {
        return view('subdirector.detalles_solicitud_dias_ecoconimicos', compact('solicitud'));
    }

    public function update_accept_solicitud_d(SolicitudD $solicitud, Request $request)//:RedirectResponse
    {
        // cambiamos validacion2 por true
        $solicitud->Validacion2 = true;

        // guardamos en la base de datos Validacion2
        $solicitud->save(); 

        // redirecionamos a dashboard
        return redirect()->route('subdirector.dashboard');
    }

    public function update_reject_solicitud_d(SolicitudD $solicitud, Request $request):RedirectResponse
    {
        // cambiamos validacion2 por false
        $solicitud->Validacion2 = false;

        // guardamos en la base de datos Validacion2
        $solicitud->save();

        // redirecionamos a dashboard
        return redirect()->route('subdirector.dashboard');
    }

    public function create_detalles_solicitud_p(SolicitudP $solicitud): View
    {
        return view('subdirector.detalles_solicitud_pases_de_salida', compact('solicitud'));
    }

    public function update_accept_solicitud_p(SolicitudP $solicitud, Request $request):RedirectResponse
    {
        // cambiamos validacion2 por true
        $solicitud->Validacion2 = true;

        // guardamos en la base de datos Validacion2
        $solicitud->save();

        // redirecionamos a dashboard
        return redirect()->route('subdirector.dashboard');
    }

    public function update_reject_solicitud_p(SolicitudP $solicitud, Request $request):RedirectResponse
    {
        // cambiamos validacion2 por false
        $solicitud->Validacion2 = false;

        // guardamos en la base de datos Validacion2
        $solicitud->save();

        // redirecionamos a dashboard
        return redirect()->route('subdirector.dashboard');
    }
}
