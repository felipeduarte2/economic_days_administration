<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Solicitudes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100"><br>

                    {{-- Tabla de Solicitudes dias economicos --}}
                    {{-- Solicitudes de permisos para dias economicos<br><br>
                    @if (count($solicitudes_d) > 0)
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-1">Motivo</th>
                                    <th scope="col" class="py-3 px-1">Fecha</th>
                                    <th scope="col" class="py-3 px-1">Estatus</th>
                                    <th scope="col" class="py-3 px-1">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($solicitudes_d as $solicitud)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="py-4 px-1 text-center">{{ $solicitud->Motivo }}</td>
                                        <td class="py-4 px-1 text-center">{{ date('d-m-Y', strtotime($solicitud->FechaSolicitada)) }}</td>
                                        <td class="py-4 px-1 text-center">
                                            @if($solicitud->Aprobacion === null)
                                            Pendiente
                                            @elseif($solicitud->Aprobacion == true)
                                                Aceptado
                                            @elseif($solicitud->Aprobacion == false)
                                                Rechazado
                                            @endif
                                        </td>
                                        <td class="py-4 px-1 text-center">
                                            <a class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                            href="{{ route('docente.detalles_solicitud_d', $solicitud->id)}}">Ver detalles</a>
                                        </td>
                                    </tr>                                         
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <div class="text-center">
                            No tiene solicitudes
                        </div>
                    @endif
                    <br><br> --}}

                    {{-- Tabla de Solicitudes pases de salida --}}
                    {{-- Solicitudes de permisos para pases de salida<br><br>
                    @if (count($solicitudes_p) > 0)
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-1">Motivo</th>
                                    <th scope="col" class="py-3 px-1">Fecha y Hora</th>
                                    <th scope="col" class="py-3 px-1">Estatus</th>
                                    <th scope="col" class="py-3 px-1">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($solicitudes_p as $solicitud)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="py-4 px-1 text-center">{{ $solicitud->Motivo }}</td>
                                        <td class="py-4 px-1 text-center">{{ date('d-m-Y', strtotime($solicitud->FechaSolicitada)) . ' ' . date('H:i', strtotime($solicitud->HoraSolicitada)) }}</td>
                                        <td class="py-4 px-1 text-center">
                                            @if($solicitud->Aprobacion === null)
                                            Pendiente
                                            @elseif($solicitud->Aprobacion == true)
                                                Aceptado
                                            @elseif($solicitud->Aprobacion == false)
                                                Rechazado
                                            @endif
                                        </td>
                                        <td class="py-4 px-1 text-center">
                                            <a class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" 
                                            href="{{ route('docente.detalles_solicitud_p', $solicitud->id)}}">Ver detalles</a>
                                        </td>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <div class="text-center">
                            No tiene solicitudes pendientes
                        </div>
                    @endif --}}

                    {{-- @if ($solicitudes_d->lastPage() > $solicitudes_p->lastPage())
                    <br>{{ $solicitudes_d->links() }} <br>
                    @elseif ($solicitudes_p->lastPage() > $solicitudes_d->lastPage())
                    <br>{{ $solicitudes_p->links() }} <br>
                    @else
                    <br>{{ $solicitudes_d->links() }} <br>
                    @endif --}}


                    {{-- Tabla de Solicitudes --}}
                    Solicitudes de permisos<br><br>
                    @if (count($solicitudes) > 0)
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-1">Motivo</th>
                                    <th scope="col" class="py-3 px-1">Fecha y Hora</th>
                                    <th scope="col" class="py-3 px-1">Estatus</th>
                                    <th scope="col" class="py-3 px-1">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($solicitudes as $solicitud)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="py-4 px-1 text-center">{{ $solicitud->Motivo }}</td>
                                        <td class="py-4 px-1 text-center">{{ date('d-m-Y', strtotime($solicitud->FechaSolicitada)) . ' ' . date('H:i', strtotime($solicitud->HoraSolicitada)) }}</td>
                                        <td class="py-4 px-1 text-center">
                                            @if($solicitud->Aprobacion === null)
                                            Pendiente
                                            @elseif($solicitud->Aprobacion == true)
                                                Aceptado
                                            @elseif($solicitud->Aprobacion == false)
                                                Rechazado
                                            @endif
                                        </td>
                                        <td class="py-4 px-1 text-center">
                                            <a class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" 
                                            @if ($solicitud->tipo_solicitud == 'pases_de_salida')
                                            href="{{ route('docente.detalles_solicitud_p', $solicitud->id)}}"
                                            @else
                                            href="{{ route('docente.detalles_solicitud_d', $solicitud->id)}}"
                                            @endif
                                            >Ver detalles</a>
                                        </td>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <div class="text-center">
                            No tiene solicitudes pendientes
                        </div>
                    @endif

                    <br>{{ $solicitudes->links() }} <br>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>