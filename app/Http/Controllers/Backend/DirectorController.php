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
    public function dashboard(){
        // Todas las solicitudes_p y solicitudes_d que se pagine por 8 registros y ordenar por el mas reciente primero
        $solicitudes_p = SolicitudP::orderBy('created_at', 'desc')->paginate(8);
        $solicitudes_d = SolicitudD::orderBy('created_at', 'desc')->paginate(8);
        return view('director.dashboard', compact('solicitudes_p', 'solicitudes_d'));
    }

    public function create_detalles_solicitud_d(SolicitudD $solicitud): View
    {
        return view('director.detalles_solicitud_dias_ecoconimicos', compact('solicitud'));
        // return view('director.detalles_solicitud_dias_ecoconimicos');
    }

    public function update_accept_solicitud_d(SolicitudD $solicitud, Request $request):RedirectResponse
    {
        return redirect()->route('director.dashboard');
    }

    public function update_reject_solicitud_d(SolicitudD $solicitud, Request $request):RedirectResponse
    {
        $solicitudes_p = SolicitudP::orderBy('created_at', 'desc')->paginate(8);
        $solicitudes_d = SolicitudD::orderBy('created_at', 'desc')->paginate(8);
        return redirect()->route('director.dashboard', compact('solicitudes_p', 'solicitudes_d'));
    }

    public function create_detalles_solicitud_p(SolicitudP $solicitud): View
    {
        return view('director.detalles_solicitud_pases_de_salida', compact('solicitud'));
        // return view('director.detalles_solicitud_pases_de_salida');
    }

    public function update_accept_solicitud_p(SolicitudP $solicitud, Request $request):RedirectResponse
    {
        return redirect()->route('director.dashboard');
    }

    public function update_reject_solicitud_p(SolicitudP $solicitud, Request $request):RedirectResponse
    {
        return redirect()->route('director.dashboard');
    }
}
