{{-- Notificación por correo electrinico que hay solicitud de permiso --}}

{{-- comprobar si $solicitud tiene HoraSolicitada--}}
@if ($solicitud->HoraSolicitada)
    {{-- h1 --}}
    <strong>
        Hay una solicitud de permiso de pase de salida pendiente de validación
    </strong>

    {{-- h2 --}}    
    <p>
        Solicitante: 
        {{
            $solicitud->user->Nombre
            . ' ' . $solicitud->user->ApellidoP
            . ' ' . $solicitud->user->ApellidoM
        }}
    </p>

    {{-- p --}}
    <p>
        Motivo: 
        {{ $solicitud->Motivo }}
    </p>

    {{-- p --}}
    <p>
        Fecha: 
        {{ $solicitud->FechaSolicitada }}
    </p>

    {{-- p --}}
    <p>
        Hora: 
        {{ $solicitud->HoraSolicitada }}
    </p>

    {{-- si $user->puesto->Descripcion is igula a 'Director' --}}
    @if ($usuario->puesto->Descripcion == 'SubDirector')
    {{-- a --}}
    <a href="{{ route('subdirector.detalles_solicitud_p', $solicitud->id) }}">Ver solicitud</a>
    {{-- else if Cordinador --}}
    @elseif ($usuario->puesto->Descripcion == 'Cordinador')
        <a href="{{ route('cordinador.detalles_solicitud_p', $solicitud->id) }}">Ver solicitud</a>
    @endif


@else
    {{-- h1 --}}
    <strong>
        Hay una solicitud de permiso un dia economico pendiente de validación
    </strong>

    {{-- h2 --}}
    <p>
        Solicitante: 
        {{
            $solicitud->user->Nombre
            . ' ' . $solicitud->user->ApellidoP
            . ' ' . $solicitud->user->ApellidoM
        }}
    </p>

    {{-- p --}}
    <p>
        Motivo: 
        {{ $solicitud->Motivo }}
    </p>

    {{-- p --}}
    <p>
        Fecha: 
        {{ $solicitud->FechaSolicitada }}
    </p>

    {{-- si $user->puesto->Descripcion is igula a 'Director' --}}
    @if ($usuario->puesto->Descripcion == 'SubDirector')
        {{-- a --}}
        <a href="{{ route('subdirector.detalles_solicitud_d', $solicitud->id) }}">Ver solicitud</a>
    {{-- else if Cordinador --}}
    @elseif ($usuario->puesto->Descripcion == 'Cordinador')
        <a href="{{ route('cordinador.detalles_solicitud_d', $solicitud->id) }}">Ver solicitud</a>
    @endif

@endif
