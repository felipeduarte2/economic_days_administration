<strong>
    Hay respuesta de permiso de pase de salida
</strong>

@if ($solicitud->tipo_solicitud == 'pases_de_salida')

    {{-- a --}}
    <a href="{{ route('docente.detalles_solicitud_p', $solicitud->id) }}">Ver respuesta</a>

@else

    {{-- a --}}
    <a href="{{ route('docente.detalles_solicitud_d', $solicitud->id) }}">Ver respuesta</a>

@endif