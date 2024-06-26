<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Periodo;
use Illuminate\Http\RedirectResponse;
use App\Models\SolicitudD;
use App\Models\SolicitudP;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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

    // vista para el listado de permisos
    public function permisos(): View
    {
        $today = Carbon::now()->format('Y-m-d');

        $periodo = Periodo::where('fecha_inicio', '<=', $today)
            ->where('fecha_fin', '>=', $today)
            ->first();

        // treaer un listado de todas las solicitudes solicitudes_d cuando cuando el user->departamento->IdDepartamento de las solicitudes_p sean igual al auth()->user()->departamento->id y que tambien Aprobacion sea true
        $solicitudes = SolicitudD::whereHas('user', function($query){
            $query->where('IdDepartamento', auth()->user()->IdDepartamento)
            ->where('Validacion3', true);
        })
        ->where('IdPeriodo', $periodo->IdPeriodo)
        ->latest()->paginate(5);
        return view('cordinador.listado_de_permisos', compact('solicitudes'));
    }
    
    // pdf de las solicitudes la funcion se llamara permisos_pdf
    public function permisos_pdf()
    {
        $today = Carbon::now()->format('Y-m-d');

        $periodo = Periodo::where('fecha_inicio', '<=', $today)
            ->where('fecha_fin', '>=', $today)
            ->first();


        // obtiene todas las solicitudes donde 
        $solicitudes = SolicitudD::whereHas('user', function($query){
            $query->where('IdDepartamento', auth()->user()->IdDepartamento)
            ->where('Validacion3', true)
            // ->where('Validacion3', true)
            ;
        })
        ->where('IdPeriodo', $periodo->IdPeriodo)
        ->latest()->get();

        $pdf = App::make('dompdf.wrapper');

        // si hay registro en solicitudes
        if ($solicitudes->count() > 0) {
            $text = '
            <style>
            table{
                border-collapse: collapse;
            }
            td, th{
                border: 1px solid black;
                text-align: center;
            }
            tr:nth-child(even){
                background-color: #f2f2f2;
            }
            </style>
            <h1>
            Lista de permisos dias economicos<br>
            <table>
                <thead>
                    <tr>
                        <th>Codig&oacute; de empleado</th>
                        <th>Nombre</th>
                        <th>Motivo</th>
                        <th>Fecha Solicitada</th>
                    </tr>
                </thead>
                <tbody>
                ';
                foreach ($solicitudes as $solicitud) {
                    $text .= '
                        <tr>
                            <td> '. $solicitud->user->Codigo_empleado .' </td>
                            <td> '. 
                            $solicitud->user->ApellidoP
                            .' '.$solicitud->user->ApellidoM 
                            .' '.$solicitud->user->Nombre
                            .'</td>
                            <td> '. $solicitud->Motivo .'</td>
                            <td> '. date("d-m-Y", strtotime($solicitud->FechaSolicitada)) .'</td>
                        </tr>
                    ';
                }
        }else
        {
            $text = '
            <h1>
            No hay Registros
            </h1>
            ';
        }

        $pdf->loadHTML($text);
        return $pdf->stream();
    }
}
