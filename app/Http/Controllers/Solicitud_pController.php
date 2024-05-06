<?php

namespace App\Http\Controllers;

use App\Models\SolicitudP;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Solicitud_pController extends Controller
{
    //
    public function create(): View
    {
        return view('vistas.solicitud_pases_de_salida');
    }

    public function store(Request $request)
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

        //return redirect()->route('solicitud_p.create');
        return redirect()->route('dashboard')->with('success', 'Solicitud creada correctamente');

    }
}
