<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Solicitudes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("You're logged in!") }} --}}

                    {{ 'Bienvenido ' . Auth::user()->Nombre  . ' ' . Auth::user()->ApellidoP }}
                    Se ha logiado como Cordinador <br><br>


                    {{-- Tabla de solicitudes $solicitudes_d --}}
                    <h3 class="text-2xl font-bold">Solicitudes</h3>
                    @if (count($solicitudes_d) > 0)

                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-1">Motivo</th>
                                    <th scope="col" class="py-3 px-1">Fecha Solicitada</th>
                                    <th scope="col" class="py-3 px-1">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($solicitudes_d as $solicitud)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="py-4 px-1 text-center">{{ $solicitud->Motivo }}</td>
                                        <td class="py-4 px-1 text-center">{{ date('d-m-Y', strtotime($solicitud->FechaSolicitada)) }}</td>
                                        <td class="py-4 px-1 text-center">
                                            <a class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                            href="{{ route('cordinador.detalles_solicitud_d', $solicitud->id)}}">Ver Detalles</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p>No hay solicitudes</p>
                    @endif

                    {{-- paginacion de $solicitudes_d --}}
                    <br>{{ $solicitudes_d->links() }} <br>

                    
                    {{-- Tabla de solicitudes $solicitudes_p --}}
                    <h3 class="text-2xl font-bold">Solicitudes</h3>
                    @if (count($solicitudes_p) > 0)
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-1">Motivo</th>
                                    <th scope="col" class="py-3 px-1">Fecha y hora Solicitada</th>
                                    <th scope="col" class="py-3 px-1">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($solicitudes_p as $solicitud)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="py-4 px-1 text-center">{{ $solicitud->Motivo }}</td>
                                        <td class="py-4 px-1 text-center">{{ date('d-m-Y', strtotime($solicitud->FechaSolicitada)). ' ' . date('H:i', strtotime($solicitud->HoraSolicitada)) }}</td>
                                        {{-- <td class="py-4 px-1 text-center">{{ $solicitud->Observaciones }}</td> --}}
                                        <td class="py-4 px-1 text-center">
                                            <a class="ml-4 inline-flex items-center px-4 py-2 bg-gray
                                            -800 dark:bg-gray-200 border border-transparent rounded-md
                                            font-semibold text-xs text-white dark:text-gray-800
                                            uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white
                                            focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900
                                            dark:active:bg-gray-300 focus:outline-none focus:ring-2
                                            focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800
                                            transition ease-in-out duration-150"
                                            href="{{ route('cordinador.detalles_solicitud_p', $solicitud->id)}}">Ver Detalles</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p>No hay solicitudes</p>
                    @endif

                    {{-- paginacion de $solicitudes_p --}}
                    <br>{{ $solicitudes_p->links() }}

                </div>
            </div>
        </div>
    </div>

</x-app-layout>