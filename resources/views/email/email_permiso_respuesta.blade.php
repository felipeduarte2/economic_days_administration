@if ($solicitud->HoraSolicitada)

    <strong>
        Hay respuesta de permiso de pase de salida
    </strong>

    {{-- a --}}
    <a href="{{ route('docente.detalles_solicitud_p', $solicitud->id) }}">Ver respuesta</a>

@else
    <strong>
        Hay respuesta de permiso de dias economico
    </strong>

    {{-- a --}}
    <a href="{{ route('docente.detalles_solicitud_d', $solicitud->id) }}">Ver respuesta</a>

@endif