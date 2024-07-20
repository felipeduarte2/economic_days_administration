{{-- Notificación por correo electrinico que hay solicitud de permiso --}}

<strong>
    Hay una solicitud de permiso pendiente de validación
</strong>

<p>
    Solicitante: 
    {{
        $solicitud->user->Nombre
        . ' ' . $solicitud->user->ApellidoP
        . ' ' . $solicitud->user->ApellidoM
    }}
</p>

<p>
    Motivo: 
    {{ $solicitud->Motivo }}
</p>

@if ($solicitud->tipo_solicitud == 'pases_de_salida')

    {{-- si $user->puesto->Descripcion is igula a 'Director' --}}
    @if ($usuario->puesto->Descripcion == 'SubDirector')
        <a href="{{ route('subdirector.detalles_solicitud_p', $solicitud->id) }}">Ver solicitud</a>
    {{-- else if Cordinador --}}
    @elseif ($usuario->puesto->Descripcion == 'Cordinador')
        <a href="{{ route('cordinador.detalles_solicitud_p', $solicitud->id) }}">Ver solicitud</a>
    @endif


@else

    {{-- si $user->puesto->Descripcion is igula a 'Director' --}}
    @if ($usuario->puesto->Descripcion == 'SubDirector')
        <a href="{{ route('subdirector.detalles_solicitud_d', $solicitud->id) }}">Ver solicitud</a>
    {{-- else if Cordinador --}}
    @elseif ($usuario->puesto->Descripcion == 'Cordinador')
        <a href="{{ route('cordinador.detalles_solicitud_d', $solicitud->id) }}">Ver solicitud</a>
    @endif

@endif
