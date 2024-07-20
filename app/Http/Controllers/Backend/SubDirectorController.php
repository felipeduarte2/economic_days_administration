<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\EmailPermisosRespueta;
use App\Models\Periodo;
use App\Models\Solicitud;
use App\Models\User;
use App\Rules\PeriodoValidoRule;
use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class SubDirectorController extends Controller
{
    /**
     * Muestra el dashboard del subdirector.
     *
     * Este método obtiene las últimas 5 solicitudes de permiso de pases de salida y de días económicos,
     * ordenadas por fecha de creación en orden descendente. Estas solicitudes se paginan para mostrar
     * un número fijo de registros por página. Luego, se muestra la vista 'subdirector.dashboard' pasando
     * las solicitudes como datos compactados.
     *
     * @return \Illuminate\View\View Vista del dashboard del subdirector.
     */
    public function dashboard(): View
    {
        // Obtener las últimas 5 solicitudes de permiso de pases de salida y de días económicos
        // ordenadas por fecha de creación en orden descendente. Estas solicitudes se paginan para mostrar
        // un número fijo de registros por página.
        $solicitudes = Solicitud::orderBy('created_at', 'desc')
        ->whereNull('Validacion2')->paginate(5);

        // Mostrar la vista 'subdirector.dashboard' pasando las solicitudes como datos compactados
        return view('subdirector.dashboard', compact('solicitudes'));
    }




    /**
     * Crea una vista para mostrar los detalles de una solicitud de días económicos.
     *
     * @param Solicitud $solicitud La solicitud de días económicos a mostrar.
     * @return View La vista de los detalles de la solicitud de días económicos.
     */
    public function create_detalles_solicitud_d(Solicitud $solicitud): View
    {
        // Retorna la vista de los detalles de la solicitud de días económicos, pasando la solicitud como variable compact.
        return view(
            'subdirector.detalles_solicitud_dias_ecoconimicos',
            compact('solicitud')
        );
    }




    /**
     * Actualiza la solicitud de días económicos aceptándola y guarda los cambios en la base de datos.
     *
     * @param Solicitud $solicitud La solicitud de días económicos que se va a aceptar.
     * @param Request $request El objeto de la solicitud HTTP.
     * @return RedirectResponse Una respuesta de redireccionamiento a la vista del dashboard del subdirector.
     */
    public function update_accept_solicitud_d(Solicitud $solicitud, Request $request):RedirectResponse
    {
        // Cambiamos la validación de la solicitud de días económicos a true.
        $solicitud->Validacion2 = true;

        // Verificamos si todas las validaciones de la solicitud son verdaderas.
        if (
            // $solicitud->Validacion1 && 
            $solicitud->Validacion2 && 
            $solicitud->Validacion3) {
            // Si todas las validaciones son verdaderas, se establece la aprobación de la solicitud en true.
            $solicitud->Aprobacion = true;
        } 
        elseif (
            $solicitud->Validacion2 === 0 || 
            $solicitud->Validacion3 !== null){
            // Si alguna de las validaciones es falsa, se establece la aprobación de la solicitud en false.
            $solicitud->Aprobacion = false;

        }
        else {
            // Si alguna de las validaciones es falsa, se establece la aprobación de la solicitud en false.
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

        // Redireccionamos a la vista del dashboard del subdirector.
        return redirect()->route('subdirector.dashboard');
    }





    /**
     * Actualiza la solicitud de días económicos rechazándola y guarda los cambios en la base de datos.
     *
     * @param Solicitud $solicitud La solicitud de días económicos que se va a rechazar.
     * @param Request $request El objeto de la solicitud HTTP.
     * @return RedirectResponse Una respuesta de redireccionamiento a la vista del dashboard del subdirector.
     */
    public function update_reject_solicitud_d(Solicitud $solicitud, Request $request):RedirectResponse
    {
        // Cambiamos la validación de la solicitud de días económicos a false.
        $solicitud->Validacion2 = false;

        // Verificamos si alguna de las validaciones de la solicitud es falsa.
        if (
            // $solicitud->Validacion1 && 
            $solicitud->Validacion2 && 
            $solicitud->Validacion3) {
            // Si todas las validaciones son verdaderas, se establece la aprobación de la solicitud en true.
            $solicitud->Aprobacion = true;
        } elseif (
            $solicitud->Validacion2 === 0 || 
            $solicitud->Validacion3 !== null){
            // Si alguna de las validaciones es falsa, se establece la aprobación de la solicitud en false.
            $solicitud->Aprobacion = false;
        } else {
            // Si ninguna de las validaciones es verdadera ni falsa, se establece la aprobación de la solicitud en null.
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

        // Redireccionamos a la vista del dashboard del subdirector.
        return redirect()->route('subdirector.dashboard');
    }




    /**
     * Crea una vista para mostrar los detalles de una solicitud de pases de salida.
     *
     * @param Solicitud $solicitud La solicitud de pases de salida a mostrar.
     * @return View La vista de los detalles de la solicitud de pases de salida.
     */
    public function create_detalles_solicitud_p(Solicitud $solicitud): View
    {
        // Retorna la vista de los detalles de la solicitud de pases de salida, 
        // pasando la solicitud como variable compact.
        return view('subdirector.detalles_solicitud_pases_de_salida', compact('solicitud'));
    }




    /**
     * Actualiza la solicitud de pases de salida aceptándola y guarda los cambios en la base de datos.
     *
     * @param Solicitud $solicitud La solicitud de pases de salida a aceptar.
     * @param Request $request El objeto de la solicitud HTTP.
     * @return RedirectResponse Una respuesta de redireccionamiento a la vista del dashboard del subdirector.
     */
    public function update_accept_solicitud_p(Solicitud $solicitud, Request $request):RedirectResponse
    {
        // Cambiamos la validación de la solicitud de pases de salida a true.
        $solicitud->Validacion2 = true;

        // Verificamos si todas las validaciones de la solicitud son verdaderas.
        if (
            // $solicitud->Validacion1 && 
            $solicitud->Validacion2 && 
            $solicitud->Validacion3) {
            // Si todas las validaciones son verdaderas, se establece la aprobación de la solicitud en true.
            $solicitud->Aprobacion = true;
        } elseif (
            $solicitud->Validacion2 === 0 || 
            $solicitud->Validacion3 !== null){
            // Si alguna de las validaciones es falsa, se establece la aprobación de la solicitud en false.
            $solicitud->Aprobacion = false;
        } else {
            // Si ninguna de las validaciones es verdadera ni falsa, se establece la aprobación de la solicitud en null.
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

        // Redireccionamos a la vista del dashboard del subdirector.
        return redirect()->route('subdirector.dashboard');
    }




    /**
     * Actualiza la solicitud de pases de salida rechazándola y guarda los cambios en la base de datos.
     *
     * @param Solicitud $solicitud La solicitud de pases de salida que se va a rechazar.
     * @param Request $request El objeto de la solicitud HTTP.
     * @return RedirectResponse Una respuesta de redireccionamiento a la vista del dashboard del subdirector.
     */
    public function update_reject_solicitud_p(Solicitud $solicitud, Request $request):RedirectResponse
    {
        // Cambiamos la validación de la solicitud de pases de salida a false.
        $solicitud->Validacion2 = false;

        // Verificamos si alguna de las validaciones de la solicitud es falsa.
        if (
            // $solicitud->Validacion1 && 
            $solicitud->Validacion2 && 
            $solicitud->Validacion3) {
            // Si todas las validaciones son verdaderas, se establece la aprobación de la solicitud en true.
            $solicitud->Aprobacion = true;
        } elseif (
            $solicitud->Validacion2 === 0 || 
            $solicitud->Validacion3 !== null){
            // Si alguna de las validaciones es falsa, se establece la aprobación de la solicitud en false.
            $solicitud->Aprobacion = false;
        } else {
            // Si ninguna de las validaciones es verdadera ni falsa, se establece la aprobación de la solicitud en null.
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

        // Redireccionamos a la vista del dashboard del subdirector.
        return redirect()->route('subdirector.dashboard');
    }




    /**
     * Crea una vista para crear una nueva solicitud de días económicos.
     *
     * @return View La vista para crear una nueva solicitud de días económicos.
     */
    public function create_solicitud_d(): View
    {
        // Traemos todos los usuarios que tengan el puesto docente,
        // ordenados de forma descendente.
        $users = User::whereHas('puesto', fn ($query) => $query->where('Descripcion', 'Docente'))
        ->latest()->get();

        // Retornamos la vista 'subdirector.create_solicitud_d',
        // pasando la variable 'users' como compact.
        // La variable 'users' contiene una colección de usuarios que
        // tienen el puesto docente.
        return view('subdirector.create_solicitud_d', compact('users'));
    }




    /**
     * Guarda una solicitud de días económicos en la base de datos.
     *
     * @param Request $request El objeto de la solicitud HTTP.
     * @return RedirectResponse Una respuesta de redireccionamiento a la vista del dashboard del subdirector.
     * @throws \Exception Si no se encuentra un período válido para la fecha actual.
     */
    public function store_solicitud_d(Request $request) :RedirectResponse
    {

        // Valida los datos de la solicitud
        $request->validate([
            'user_id' => 'required',
            'Motivo' => 'required',
            'Fecha' => 
                [
                    'required', 'date',
                    'after:' . Carbon::yesterday()->format('Y-m-d'),
                    new PeriodoValidoRule
                ],// Fecha solicitada, la Fecha debe ser despues a partir de hoy
            // 'Observaciones' => 'required',
        ]);

        // Obtiene el período
        $periodo = Periodo::where('fecha_inicio', '<=', $request->Fecha)
            ->where('fecha_fin', '>=', $request->Fecha)
            ->first();

        // Crea una nueva solicitud de días económicos
        $solicitud = Solicitud::create([
            'Motivo' => $request->Motivo,
            'tipo_solicitud' => 'dias_economicos',
            'FechaSolicitada' => $request->Fecha,
            'FechaSolicitud' => date('Y-m-d'),
            'Observaciones' => $request->Observaciones,
            'user_id' => $request->user_id,
            'IdPeriodo' => $periodo->IdPeriodo,
            'Aprobacion' => true,
            'Validacion1' => true,
            'Validacion2' => true,
            'Validacion3' => true,
            'FechaValida1' => date('Y-m-d'),
            'FechaValida3' => date('Y-m-d'),
            'FechaValida3' => date('Y-m-d'),
        ]);

        // Guarda la solicitud en la base de datos
        $solicitud->save();

        // ontener el usuario por el $request->user_id
        $user = User::find($request->user_id);

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

        // Redirecciona al tablero del subdirector
        return redirect()->route('subdirector.dashboard');
    }
}
