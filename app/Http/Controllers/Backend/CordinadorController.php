<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\EmailPermisosRespueta;
use App\Models\Periodo;
use Illuminate\Http\RedirectResponse;
use App\Models\SolicitudD;
use App\Models\SolicitudP;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class CordinadorController extends Controller
{
    /**
     * Muestra el tablero del coordinador.
     *
     * Obtiene todas las solicitudes de permisos de los usuarios de su departamento,
     * que aún no han sido validadas por el coordinador.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard(): View
    {
        // Traemos todas las solicitudes de permisos de los usuarios de su departamento,
        // que aún no han sido validadas por el coordinador.
        // Utilizamos el método whereHas para obtener las solicitudes que tengan un usuario
        // que pertenezca a su departamento.
        $solicitudes_p = SolicitudP::whereHas('user', function($query){
            // Filtramos los usuarios que pertenezcan a su departamento.
            $query->where('IdDepartamento', auth()->user()->IdDepartamento);
        })
        // Filtramos las solicitudes que no hayan sido validadas por el coordinador.
        ->whereNull('Validacion3')
        // Ordenamos las solicitudes por la fecha de creación en orden descendente.
        ->latest()->paginate(5);

        // Traemos todas las solicitudes de días económicos de los usuarios de su departamento,
        // que aún no han sido validadas por el coordinador.
        $solicitudes_d = SolicitudD::whereHas('user', function($query){
            // Filtramos los usuarios que pertenezcan a su departamento.
            $query->where('IdDepartamento', auth()->user()->IdDepartamento);
        })
        // Filtramos las solicitudes que no hayan sido validadas por el coordinador.
        ->whereNull('Validacion3')
        // Ordenamos las solicitudes por la fecha de creación en orden descendente.
        ->latest()->paginate(5);

        // Devolvemos la vista del tablero del coordinador, pasando las solicitudes de permisos
        // y días económicos como variables.
        return view('cordinador.dashboard', compact('solicitudes_p', 'solicitudes_d'));
    }





    /**
     * Crea una vista para mostrar los detalles de una solicitud de días económicos.
     *
     * @param SolicitudD $solicitud La solicitud de días económicos a mostrar.
     * @return View La vista de los detalles de la solicitud de días económicos.
     */
    public function create_detalles_solicitud_d(SolicitudD $solicitud): View
    {
        // Retorna la vista de los detalles de la solicitud de días económicos, pasando la solicitud como variable compact.
        return view(
            'cordinador.detalles_solicitud_dias_ecoconimicos',
            // Pasamos la solicitud como variable compact.
            compact('solicitud')
        );
    }





    /**
     * Actualiza la solicitud de días económicos y cambia el estado de validación por el coordinador a true.
     *
     * @param SolicitudD $solicitud La solicitud de días económicos a actualizar.
     * @param Request $request El objeto de solicitud que contiene los datos de la solicitud.
     * @return RedirectResponse La respuesta de redirección a la vista del tablero del coordinador.
     */
    public function update_accept_solicitud_d(SolicitudD $solicitud, Request $request):RedirectResponse
    {
        // Cambiamos el estado de validación por el coordinador a true.
        $solicitud->Validacion3 = true;

        // Si la solicitud ha sido validada por las personas correspondientes, la aprobamos.
        if (
            $solicitud->Validacion2 && 
            $solicitud->Validacion3) {
            $solicitud->Aprobacion = true;
        } elseif (
            $solicitud->Validacion2 !== null || 
            $solicitud->Validacion3 === 0){
            $solicitud->Aprobacion = false;
        }else { $solicitud->Aprobacion = null;}

        // Guardamos los cambios en la base de datos.
        $solicitud->save(); 

        if($solicitud->Aprobacion !== null){
            // obetener al usuario de la solicitud
            $user = User::find($solicitud->user_id);

            // si exite el usuario
            if ($user) {
                // si el usuario tiene un correo electronico
                if ($user->email) {
                    // Envio de notificación por correo electronico
                    try{
                        Mail::to(
                            $user->email
                        )->send(
                            new EmailPermisosRespueta($solicitud)
                        );
                    }
                    catch (\Exception $e)
                    {
                        throw $e;
                    }
                }
            }
        }

        // Redirigimos a la vista del tablero del coordinador.
        return redirect()->route('cordinador.dashboard');
    }





    /**
     * Actualiza la solicitud de días económicos y cambia el estado de validación por el coordinador a false.
     *
     * @param SolicitudD $solicitud La solicitud de días económicos a actualizar.
     * @param Request $request El objeto de solicitud que contiene los datos de la solicitud.
     * @return RedirectResponse La respuesta de redirección a la vista del tablero del coordinador.
     */
    public function update_reject_solicitud_d(SolicitudD $solicitud, Request $request):RedirectResponse
    {
        // Cambiamos el estado de validación por el coordinador a false.
        $solicitud->Validacion3 = false;

        // Si $solicitud->Validacion1 y 2 es true, aprobamos.
        if (
            // $solicitud->Validacion1 && 
            $solicitud->Validacion2 && 
            $solicitud->Validacion3) {
            $solicitud->Aprobacion = true;
        } 
        // Si alguna de las validaciones es 0, rechazamos.
        elseif (
            // !$solicitud->Validacion1 || 
            $solicitud->Validacion2 !== null || 
            $solicitud->Validacion3 === 0){
            $solicitud->Aprobacion = false;
        }
        // Si ninguna de las validaciones es 0 ni true, no sabemos si se acepta o rechaza.
        else { 
            $solicitud->Aprobacion = null;
        }

        // Guardamos los cambios en la base de datos.
        $solicitud->save(); 

        if($solicitud->Aprobacion !== null){
            // obetener al usuario de la solicitud
            $user = User::find($solicitud->user_id);

            // si exite el usuario
            if ($user) {
                // si el usuario tiene un correo electronico
                if ($user->email) {
                    // Envio de notificación por correo electronico
                    try{
                    Mail::to(
                        $user->email
                    )->send(
                        new EmailPermisosRespueta($solicitud)
                    );
                    }
                    catch (\Exception $e)
                    {
                        throw $e;
                    }
                }
            }
        }

        // Redirigimos a la vista del tablero del coordinador.
        return redirect()->route('cordinador.dashboard');
    }





    /**
     * Crea una vista para mostrar los detalles de una solicitud de pases de salida.
     *
     * @param SolicitudP $solicitud La solicitud de pases de salida a mostrar.
     * @return View La vista de los detalles de la solicitud de pases de salida.
     */
    public function create_detalles_solicitud_p(SolicitudP $solicitud): View
    {
        // Retorna la vista de los detalles de la solicitud de pases de salida,
        // pasando la solicitud como variable compact.
        return view(
            'cordinador.detalles_solicitud_pases_de_salida',
            compact('solicitud')
        );
    }





    /**
     * Actualiza la solicitud de pases de salida y cambia el estado de validación por el coordinador a true.
     *
     * @param SolicitudP $solicitud La solicitud de pases de salida a actualizar.
     * @param Request $request El objeto de solicitud que contiene los datos de la solicitud.
     * @return RedirectResponse La respuesta de redirección a la vista del tablero del coordinador.
     */
    public function update_accept_solicitud_p(SolicitudP $solicitud, Request $request):RedirectResponse
    {
        // Cambiamos el estado de validación por el coordinador a true.
        $solicitud->Validacion3 = true;

        // Si $solicitud->Validacion1 y 2 es true, aprobamos.
        if (
            // $solicitud->Validacion1 && 
            $solicitud->Validacion2 && 
            $solicitud->Validacion3) {
            $solicitud->Aprobacion = true;
        } 
        // Si alguna de las validaciones es 0, rechazamos.
        elseif (
            // !$solicitud->Validacion1 || 
            $solicitud->Validacion2 !== null || 
            $solicitud->Validacion3 === 0){
            $solicitud->Aprobacion = false;
        }
        // Si ninguna de las validaciones es 0 ni true, no sabemos si se acepta o rechaza.
        else { 
            $solicitud->Aprobacion = null;
        }

        // Guardamos los cambios en la base de datos.
        $solicitud->save(); 

        if($solicitud->Aprobacion !== null){
            // obetener al usuario de la solicitud
            $user = User::find($solicitud->user_id);

            // si exite el usuario
            if ($user) {
                // si el usuario tiene un correo electronico
                if ($user->email) {
                    // Envio de notificación por correo electronico
                    try{
                        Mail::to(
                            $user->email
                        )->send(
                            new EmailPermisosRespueta($solicitud)
                        );
                    }
                    catch (\Exception $e)
                    {
                        throw $e;
                    }
                    }
            }
        }

        // Redirigimos a la vista del tablero del coordinador.
        return redirect()->route('cordinador.dashboard');
    }





    /**
     * Actualiza la solicitud de pases de salida y cambia el estado de validación por el coordinador a false.
     *
     * @param SolicitudP $solicitud La solicitud de pases de salida a actualizar.
     * @param Request $request El objeto de solicitud que contiene los datos de la solicitud.
     * @return RedirectResponse La respuesta de redirección a la vista del tablero del coordinador.
     */
    public function update_reject_solicitud_p(SolicitudP $solicitud, Request $request):RedirectResponse
    {
        // Cambiamos el estado de validación por el coordinador a false.
        $solicitud->Validacion3 = false;

        // Si $solicitud->Validacion1 y 2 es true, aprobamos.
        if (
            // $solicitud->Validacion1 && 
            $solicitud->Validacion2 && 
            $solicitud->Validacion3) {
            $solicitud->Aprobacion = true;
        } 
        // Si alguna de las validaciones es 0, rechazamos.
        elseif (
            // !$solicitud->Validacion1 || 
            $solicitud->Validacion2 !== null || 
            $solicitud->Validacion3 === 0){
            $solicitud->Aprobacion = false;
        }
        // Si ninguna de las validaciones es 0 ni true, no sabemos si se acepta o rechaza.
        else { 
            $solicitud->Aprobacion = null;
        }

        // Guardamos los cambios en la base de datos.
        $solicitud->save();

        if($solicitud->Aprobacion !== null){
            // obetener al usuario de la solicitud
            $user = User::find($solicitud->user_id);

            // si exite el usuario
            if ($user) {
                // si el usuario tiene un correo electronico
                if ($user->email) {
                    // Envio de notificación por correo electronico
                    try{
                        Mail::to(
                            $user->email
                        )->send(
                            new EmailPermisosRespueta($solicitud)
                        );
                    }
                    catch (\Exception $e)
                    {
                        throw $e;
                    }
                }
            }
        }

        // Redirigimos a la vista del tablero del coordinador.
        return redirect()->route('cordinador.dashboard');
    }





    /**
     * Vista para mostrar el listado de permisos.
     * 
     * Trae un listado de todas las solicitudes de días económicos (SolicitudD)
     * que pertenezcan al departamento del usuario autenticado, que sean aprobadas
     * (Aprobacion = true) y que pertenezcan al período actual.
     *
     * @return \Illuminate\View\View La vista del listado de permisos.
     */
    public function permisos(): View
    {
        // Obtener la fecha actual en formato Y-m-d
        $today = Carbon::now()->format('Y-m-d');

        // Obtener el período actual
        $periodo = Periodo::where('fecha_inicio', '<=', $today)
            ->where('fecha_fin', '>=', $today)
            ->first();

        // Obtener las solicitudes de días económicos aprobadas del departamento del usuario autenticado
        $solicitudes = SolicitudD::whereHas('user', function($query){
            // Filtrar por el departamento del usuario
            $query->where('IdDepartamento', auth()->user()->IdDepartamento);
        })
        ->where('Aprobacion', true)
        ->where('IdPeriodo', $periodo->IdPeriodo)
        ->latest()->paginate(10);

        // Devolver la vista del listado de permisos, pasando las solicitudes y el período como variables
        return view('cordinador.listado_de_permisos', compact('solicitudes', 'periodo'));
    }





    /**
     * Genera un PDF con el listado de permisos de días económicos.
     *
     * Obtiene las solicitudes de días económicos aprobadas del departamento del usuario autenticado
     * que pertenecen al período actual y genera un PDF con la información de estas solicitudes.
     *
     * @return \Illuminate\Http\Response El PDF generado con el listado de permisos.
     */
    public function permisos_pdf()
    {
        // Obtener la fecha actual en formato Y-m-d
        $today = Carbon::now()->format('Y-m-d');

        // Obtener el período actual
        $periodo = Periodo::where('fecha_inicio', '<=', $today)
            ->where('fecha_fin', '>=', $today)
            ->first();

        // Obtener las solicitudes de días económicos aprobadas del departamento del usuario autenticado
        $solicitudes = SolicitudD::whereHas('user', function($query){
            // Filtrar por el departamento del usuario
            $query->where('IdDepartamento', auth()->user()->IdDepartamento);
        })
        ->where('Aprobacion', true)
        ->where('IdPeriodo', $periodo->IdPeriodo)
        ->latest()->get();

        $pdf = App::make('dompdf.wrapper');

        // Si hay registro en solicitudes
        if ($solicitudes->count() > 0) {
            $text = '
            <!-- Estilo CSS para la tabla -->
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
            <!-- Encabezado del PDF -->
            <h1>
            Lista de permisos de dias economicos<br>
            <!-- Tabla con la información de las solicitudes -->
            <table>
                <thead>
                    <tr>
                        <th>Codig&oacute; de empleado</th>
                        <th>Nombre</th>
                        <th>Motivo</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
            ';
            // Recorrer las solicitudes y generar las filas de la tabla
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
        }else{
            // Si no hay registros, mostrar un mensaje de no hay registros
            $text = '
            <h1>
            No hay Registros
            </h1>
            ';
        }

        // Cargar el contenido HTML en el PDF
        $pdf->loadHTML($text);

        // Devolver el PDF como respuesta
        return $pdf->stream();
    }





    /**
     * Funcion para buscar solicitudes de dias economicos
     * entre dos fechas y mostrarlas en un PDF
     *
     * @param Request $request Objeto de solicitud que contiene las fechas de inicio y fin
     * @return \Illuminate\Http\Response Devuelve el PDF con las solicitudes
     */
    public function search(Request $request){

        // Validar que las fechas sean requeridas y sean fechas
        $request->validate([
            'start' => 'required|date',
            'end' => 'required|date',
        ]);

        // Obtener las solicitudes entre las fechas
        $solicitudes = SolicitudD::whereHas('user', function($query){
            $query->where('IdDepartamento', auth()->user()->IdDepartamento);
        })
        ->where('Aprobacion', true)
        ->where('FechaSolicitada', '>=', Carbon::parse($request->start)->format('Y-m-d'))
        ->where('FechaSolicitada', '<=', Carbon::parse($request->end)->format('Y-m-d'))
        ->latest()->get();

        // Crear el objeto PDF
        $pdf = App::make('dompdf.wrapper');

        // Si hay registros, generar el contenido HTML para el PDF
        if ($solicitudes->count() > 0) {
            $text = '
            <!-- Estilo para la tabla -->
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
            <!-- Encabezado del PDF -->
            <h1>
            Lista de permisos de dias economicos<br>
            <!-- Tabla de solicitudes -->
            <table>
                <thead>
                    <tr>
                        <th>Codig&oacute; de empleado</th>
                        <th>Nombre</th>
                        <th>Motivo</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                ';
                // Generar las filas de la tabla
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
            // Si no hay registros, mostrar un mensaje de no hay registros
            $text = '
            <h1>
            No hay Registros
            </h1>
            ';
        }

        // Cargar el contenido HTML en el PDF
        $pdf->loadHTML($text);

        // Devolver el PDF como respuesta
        return $pdf->stream();
    }
}
