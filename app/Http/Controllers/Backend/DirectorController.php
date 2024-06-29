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
    /**
     * Muestra el dashboard del director.
     *
     * Método que muestra el dashboard del director, mostrando las solicitudes
     * de permisos de días económicos y vacaciones recientes, ordenadas por fecha
     * de creación en orden descendente, y paginadas por 5 registros.
     *
     * @return View Vista del dashboard del director.
     */
    public function dashboard(): View
    {
        // Obtenemos las solicitudes de permisos de días económicos y vacaciones
        // más recientes, ordenadas por fecha de creación en orden descendente,
        // y paginadas por 5 registros.
        $solicitudes_p = SolicitudP::orderBy('created_at', 'desc')->paginate(5);
        $solicitudes_d = SolicitudD::orderBy('created_at', 'desc')->paginate(5);

        // Devolvemos la vista del dashboard del director, pasando las solicitudes
        // de permisos como parámetros.
        return view('director.dashboard', compact('solicitudes_p', 'solicitudes_d'));
    }





    /**
     * Crea una vista para mostrar los detalles de una solicitud de días económicos.
     *
     * @param SolicitudD $solicitud La solicitud de días económicos a mostrar.
     * @return View La vista de los detalles de la solicitud de días económicos.
     */
    public function create_detalles_solicitud_d(SolicitudD $solicitud): View
    {
        // Creamos la vista de los detalles de la solicitud de días económicos,
        // pasando la solicitud como variable compact.
        return view(
            'director.detalles_solicitud_dias_ecoconimicos', // Nombre de la vista.
            compact('solicitud') // Variables compact.
        );
    }





    /**
     * Actualiza la solicitud de días económicos y establece la validación en true.
     *
     * @param SolicitudD $solicitud La solicitud de días económicos a actualizar.
     * @param Request $request El objeto de solicitud HTTP.
     * @return RedirectResponse La respuesta de redirección al dashboard.
     */
    public function update_accept_solicitud_d(SolicitudD $solicitud, Request $request):RedirectResponse
    {
        // Establecemos la validación en true
        $solicitud->Validacion1 = true;

        // Si todas las validaciones son true, establecemos la aprobación en true
        if (
            $solicitud->Validacion1 && 
            $solicitud->Validacion2 && 
            $solicitud->Validacion3) {
            $solicitud->Aprobacion = true;
        } 
        // Si alguna de las validaciones es false, establecemos la aprobación en false
        elseif (
            !$solicitud->Validacion1 || 
            !$solicitud->Validacion2 || 
            !$solicitud->Validacion3){
            $solicitud->Aprobacion = false;
        } 
        // Si alguna de las validaciones está nula, dejamos la aprobación en nula
        else { 
            $solicitud->Aprobacion = null;
        }

        // Guardamos los cambios en la base de datos
        $solicitud->save(); 

        // Redireccionamos al dashboard
        return redirect()->route('director.dashboard');
    }





    /**
     * Actualiza la solicitud de días económicos y redirecciona al dashboard.
     * Cambia la validación 1 por false y actualiza la aprobación según las validaciones.
     *
     * @param SolicitudD $solicitud La solicitud de días económicos a actualizar.
     * @param Request $request El objeto de solicitud HTTP.
     * @return RedirectResponse La respuesta de redirección al dashboard.
     */
    public function update_reject_solicitud_d(SolicitudD $solicitud, Request $request):RedirectResponse
    {
        // cambiamos validacion1 por false
        $solicitud->Validacion1 = false;

        // si $solicitud->Validacion1 y 2 es true
        // actualizamos la aprobación según las validaciones
        if (
            $solicitud->Validacion1 && 
            $solicitud->Validacion2 && 
            $solicitud->Validacion3) {
            $solicitud->Aprobacion = true;
        } elseif (
            !$solicitud->Validacion1 || 
            !$solicitud->Validacion2 || 
            !$solicitud->Validacion3){
            $solicitud->Aprobacion = false;
        }else { $solicitud->Aprobacion = null;}

        // guardamos en la base de datos Validacion1
        $solicitud->save();

        // redirecionamos a dashboard
        return redirect()->route('director.dashboard');
    }





    /**
     * Crea una vista con los detalles de una solicitud de pases de salida.
     * 
     * @param SolicitudP $solicitud La solicitud de pases de salida.
     * 
     * @return View La vista con los detalles de la solicitud de pases de salida.
     */
    public function create_detalles_solicitud_p(SolicitudP $solicitud): View
    {
        // Retornamos la vista 'director.detalles_solicitud_pases_de_salida' con la solicitud como datos compactados.
        return view('director.detalles_solicitud_pases_de_salida', compact('solicitud'));
    }





    /**
     * Actualiza la validación 1 de la solicitud de pases de salida a aceptada y guarda los cambios en la base de datos.
     * 
     * @param SolicitudP $solicitud La solicitud de pases de salida.
     * @param Request $request El objeto Request.
     * 
     * @return RedirectResponse Redirecciona a la vista del dashboard del director.
     */
    public function update_accept_solicitud_p(SolicitudP $solicitud, Request $request):RedirectResponse
    {
        // Cambiamos la validación 1 de la solicitud por true
        $solicitud->Validacion1 = true;

        // Si las tres validaciones son true, establecemos la aprobación en true,
        // de lo contrario, si alguna de las validaciones es false, establecemos la aprobación en false,
        // y si alguna de las validaciones es null, establecemos la aprobación en null.
        if (
            $solicitud->Validacion1 && 
            $solicitud->Validacion2 && 
            $solicitud->Validacion3) {
            $solicitud->Aprobacion = true;
        } elseif (
            !$solicitud->Validacion1 || 
            !$solicitud->Validacion2 || 
            !$solicitud->Validacion3){
            $solicitud->Aprobacion = false;
        }else { 
            $solicitud->Aprobacion = null;
        }

        // Guardamos los cambios en la base de datos.
        $solicitud->save();

        // Redireccionamos a la vista del dashboard del director.
        return redirect()->route('director.dashboard');
    }





    /**
     * Actualiza la validación 1 de la solicitud de pases de salida a rechazada y guarda los cambios en la base de datos.
     * 
     * @param SolicitudP $solicitud La solicitud de pases de salida.
     * @param Request $request El objeto Request.
     * 
     * @return RedirectResponse Redirecciona a la vista del dashboard del director.
     */
    public function update_reject_solicitud_p(SolicitudP $solicitud, Request $request):RedirectResponse
    {
        // Cambiamos la validación 1 de la solicitud por false
        $solicitud->Validacion1 = false;

        // Si todas las validaciones son true, establecemos la aprobación en true,
        // de lo contrario, si alguna de las validaciones es false, establecemos la aprobación en false,
        // y si alguna de las validaciones es null, establecemos la aprobación en null.
        if (
            $solicitud->Validacion1 && 
            $solicitud->Validacion2 && 
            $solicitud->Validacion3) {
            $solicitud->Aprobacion = true;
        } elseif (
            !$solicitud->Validacion1 || 
            !$solicitud->Validacion2 || 
            !$solicitud->Validacion3){
            $solicitud->Aprobacion = false;
        }else { 
            $solicitud->Aprobacion = null;
        }

        // Guardamos los cambios en la base de datos.
        $solicitud->save();

        // Redireccionamos a la vista del dashboard del director.
        return redirect()->route('director.dashboard');
    }
}
