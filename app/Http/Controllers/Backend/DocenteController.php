<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\EmailPermisos;
use App\Models\Periodo;
use App\Models\Solicitud;
use App\Models\User;
use App\Rules\PeriodoValidoRule;
use App\Rules\PermisosPorDiaRule;
use App\Rules\PermisosPorPeriodoRule;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class DocenteController extends Controller
{

    /**
     * Mostrar el tablero del docente.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard(): View
    {
        // Obtenga todas las solicitudes donde el user_id es igual al id del usuario autenticado
        $solicitudes = Solicitud::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(5);

        // Devuelve la vista docente.dashboard con las variables solicitudes_d y solicitudes_p
        return view(
            'docente.dashboard',
            compact('solicitudes')
        );
    }



    /**
     * Crea una vista para el formulario de solicitud de días económicos.
     *
     * @return \Illuminate\View\View
     */
    public function create_solicitud_d(): View
    {
        // Devolver la vista del formulario de solicitud de días económicos
        return view('docente.solicitud_dias_ecoconimicos');
    }



    /**
     * Guarda una solicitud de días económicos.
     *
     * @param Request $request La solicitud HTTP con los datos de la solicitud.
     * @return RedirectResponse Redirecciona al tablero del docente.
     * @throws \Exception Si no se encuentra un período válido para la fecha actual.
     */
    public function store_solicitud_d(Request $request): RedirectResponse
    {
        // Valida los datos de la solicitud
        $request->validate([
            'Motivo' => 'required',
            'Fecha' => [
                'required','date',
                'after:' . Carbon::yesterday()->format('Y-m-d'),
                new PermisosPorPeriodoRule, // Verifica que el día sea válido para el período actual
                new PermisosPorDiaRule // Verifica que el día sea válido
            ],// Fecha solicitada, la Fecha debe ser despues a partir de hoy
            // 'Observaciones' => 'required',
        ]);

        // Obtiene el período
        $periodo = Periodo::where('fecha_inicio', '<=', $request->Fecha)
            ->where('fecha_fin', '>=', $request->Fecha)
            ->first();

        // Crea una nueva solicitud de días económicos
        $solicitud = Solicitud::create([
            'tipo_solicitud' => 'dias_economicos',
            'Motivo' => $request->Motivo, // Motivo de la solicitud
            'FechaSolicitud' => date('Y-m-d'), // Fecha de creación de la solicitud
            'FechaSolicitada' => $request->Fecha, // Fecha solicitada
            'Observaciones' => $request->Observaciones, // Observación de la solicitud
            'user_id' => auth()->user()->id, // ID del usuario que creó la solicitud
            'IdPeriodo' => $periodo->IdPeriodo, // ID del período actual
        ]);

        // Guarda la solicitud en la base de datos
        $solicitud->save();

        // obtener el user sub director
        $subdirector = User::
            whereHas('puesto', fn ($query) => $query->where('Descripcion', 'SubDirector'))
            ->where('status', 'Activo')
            ->first();

        // si exite sub director
        if ($subdirector) {
            // Envio de notificación por correo electronico
            try
            {
                Mail::to(
                    $subdirector->email
                )->send(
                    new EmailPermisos($solicitud, $subdirector)
                );
            }
            catch (\Exception $e)
            {
                throw $e;
            }
        }

        // Obtener el cordinador
        $cordinador = User::whereHas('puesto', fn ($query) => $query->where('Descripcion', 'Cordinador'))
            ->where('status', 'Activo')
            ->where('IdDepartamento', auth()->user()->IdDepartamento)
            ->first();

        // si exite cordinador
        if ($cordinador) {
            // Envio de notificación por correo electronico
            try{
                Mail::to(
                    $cordinador->email
                )->send(
                    new EmailPermisos($solicitud, $cordinador)
                );
            }
            catch (\Exception $e)
            {
                throw $e;
            }
        }

        // Redirecciona al tablero del docente
        return redirect()->route('docente.dashboard');
    }



    /**
     * Crea una vista para el formulario de solicitud de pases de salida.
     *
     * @return \Illuminate\View\View La vista del formulario de solicitud de pases de salida.
     */
    public function create_solicitud_p(): View
    {
        // Devolver la vista del formulario de solicitud de pases de salida
        return view('docente.solicitud_pases_de_salida');
    }



    /**
     * Guarda una solicitud de pases de salida.
     *
     * @param Request $request La solicitud HTTP con los datos de la solicitud.
     * @return RedirectResponse Redirecciona al tablero del docente.
     * @throws \Exception Si no se encuentra un período válido para la fecha actual.
     */
    public function store_solicitud_p(Request $request): RedirectResponse
    {
        // Valida los datos de la solicitud
        $request->validate([
            'Motivo' => 'required', // Motivo de la solicitud
            'Fecha' => [
                'required', 'date',
                'after:' . Carbon::yesterday()->format('Y-m-d'),
                new PeriodoValidoRule
            ], // Fecha solicitada, la Fecha debe ser despues a partir de hoy
            'Hora' => 'required', // Hora solicitada
            // 'Observaciones' => 'required', // Observación de la solicitud (opcional)
        ]);

        // Obtiene el período
        $periodo = Periodo::where('fecha_inicio', '<=', $request->Fecha,)
            ->where('fecha_fin', '>=', $request->Fecha,)
            ->first();


        // Crea una nueva solicitud de pases de salida
        $solicitud = Solicitud::create([
            'tipo_solicitud' => 'pases_de_salida',
            'Motivo' => $request->Motivo,
            'FechaSolicitud' => date('Y-m-d'),
            'FechaSolicitada' => $request->Fecha,
            'HoraSolicitada' => $request->Hora,
            'Observaciones' => $request->Observaciones,
            'user_id' => auth()->user()->id,
            // ID del período actual
            'IdPeriodo' => $periodo->IdPeriodo,
        ]);

        // Guarda la solicitud en la base de datos
        $solicitud->save();

        // obtener el user sub director
        $subdirector = User::
            whereHas('puesto', fn ($query) => $query->where('Descripcion', 'SubDirector'))
            ->where('status', 'Activo')
            ->first();

        // si exite sub director
        if ($subdirector) {
            // Envio de notificación por correo electronico
            try{
                Mail::to(
                    $subdirector->email
                )->send(
                    new EmailPermisos($solicitud, $subdirector)
                );
            }
            catch (\Exception $e)
            {
                throw $e;
            }

        }

        // Obtener el cordinador
        $cordinador = User::whereHas('puesto', fn ($query) => $query->where('Descripcion', 'Cordinador'))
            ->where('status', 'Activo')
            ->where('IdDepartamento', auth()->user()->IdDepartamento)
            ->first();

        // si exite cordinador
        if ($cordinador) {
            // Envio de notificación por correo electronico
            try{
                
                Mail::to(
                    $cordinador->email
                )->send(
                    new EmailPermisos($solicitud, $cordinador)
                );
            }
            catch (\Exception $e)
            {
                throw $e;
            }
        }

        // Redirecciona al tablero del docente
        return redirect()->route('docente.dashboard');
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
        return view('docente.detalles_solicitud_dias_ecoconimicos', compact('solicitud'));
    }



    /**
     * Crea una vista para mostrar los detalles de una solicitud de pases de salida.
     *
     * @param Solicitud $solicitud La solicitud de pases de salida a mostrar.
     * @return View La vista de los detalles de la solicitud de pases de salida.
     */
    public function create_detalles_solicitud_p(Solicitud $solicitud): View
    {
        // Retorna la vista de los detalles de la solicitud de pases de salida, pasando la solicitud como variable compact.
        return view('docente.detalles_solicitud_pases_de_salida', compact('solicitud'));
    }

}
