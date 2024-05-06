<?php

namespace App\Http\Controllers;

use App\Models\SolicitudD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\View\View;

class Solicitud_dController extends Controller
{
    //
    public function create(): View
    {
        return view('vistas.solicitud_dias_ecoconimicos');
    }

    public function store(Request $request)
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

        //return redirect()->route('solicitud_d.create');
        return redirect()->route('dashboard')->with('success', 'Solicitud creada correctamente');

        //return redirect(route('dashboard', absolute: false));
    }

}
