<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SolicitudD;
use App\Models\SolicitudP;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DocenteController extends Controller
{
    //
    public function dashboard(){

        //Todas las solicitudes where user_id sea igual al del usuario
        $solicitudes_p = SolicitudP::where('user_id', auth()->user()->id)->get();
        $solicitudes_d = SolicitudD::where('user_id', auth()->user()->id)->get();
        return view('docente.dashboard', compact('solicitudes_d', 'solicitudes_p'));
        // return view('docente.dashboard');
    }

    // Solicitud de permisos de dias economicos 
    public function create_solicitud_d(): View
    {
        return view('docente.solicitud_dias_ecoconimicos');
    }

    public function store_solicitud_d(Request $request): RedirectResponse
    {
        $request->validate([
            'Motivo' => 'required',
            'Fecha' => 'required',
            // 'Observaciones' => 'required',
        ]);

        $solicitud = SolicitudD::create([
            'Motivo' => $request->Motivo,
            'FechaSolicitud' => date('Y-m-d'),
            'FechaSolicitada' => $request->Fecha,
            'Observaciones' => $request->Observaciones,
            'user_id' => auth()->user()->id,
            'IdPeriodo' => 1,
        ]);

        $solicitud->save();

        return redirect(route('docente.dashboard'));

    }

    // Solicitud de pases de salida
    public function create_solicitud_p(): View
    {
        return view('docente.solicitud_pases_de_salida');
    }

    public function store_solicitud_p(Request $request): RedirectResponse
    {
        $request->validate([
            'Motivo' => 'required',
            'Fecha' => 'required',
            'Hora' => 'required',
            // 'Observaciones' => 'required',
        ]);

        $solicitud = SolicitudP::create([
            'Motivo' => $request->Motivo,
            'FechaSolicitud' => date('Y-m-d'),
            'FechaSolicitada' => $request->Fecha,
            'HoraSolicitada' => $request->Hora,
            'Observaciones' => $request->Observaciones,
            'user_id' => auth()->user()->id,
            'IdPeriodo' => 1,
        ]);

        $solicitud->save();

        return redirect(route('docente.dashboard'));

    }

    public function create_detalles_solicitud_d(SolicitudD $solicitud): View
    {
        return view('docente.detalles_solicitud_dias_ecoconimicos', compact('solicitud'));
        // return view('docente.detalles_solicitud_dias_ecoconimicos');
    }

    public function create_detalles_solicitud_p(SolicitudP $solicitud): View
    {
        return view('docente.detalles_solicitud_pases_de_salida', compact('solicitud'));
        // return view('docente.detalles_solicitud_pases_de_salida');
    }

}
