<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("You're logged in!") }} --}}

                    {{ 'Bienvenido ' . Auth::user()->Nombre  . ' ' . Auth::user()->ApellidoP }}
                    Se ha logiado como Docente

                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                        {{-- Solicitar Permiso dias economicos --}}
                        <a 
                        class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" 
                        href="{{ route('docente.solicitud_dias_ecoconimicos') }} "
                        >Solicitar Permiso dias economicos</a>

                        {{-- Solicitar Permiso pases de salida --}}
                        <a 
                        class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" 
                        href="{{ route('docente.solicitud_pases_salida') }} "
                        >Solicitar Permiso pases de salida</a>

                    </div><br>

                    Tabla de Solicitudes dias economicos
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-1">Motivo</th>
                                    <th scope="col" class="py-3 px-1">Fecha</th>
                                    <th scope="col" class="py-3 px-1">Estatus</th>
                                    <th scope="col" class="py-3 px-1">Acciones</th>
                                </tr>
                                <tbody>

                                    @foreach ($solicitudes_d as $solicitud)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                            {{-- <td class="py-4 px-1">{{ $solicitud->id }}</td> --}}
                                            <td class="py-4 px-1 text-center">{{ $solicitud->Motivo }}</td>
                                            <td class="py-4 px-1 text-center">{{ $solicitud->FechaSolicitada }}</td>
                                            <td class="py-4 px-1 text-center">Pendiente</td>
                                            <td class="py-4 px-1 text-center">
                                                <a class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                                href="#">Ver detalles</a>
                                            </td>                                            
                                    @endforeach
                                </tbody>
                            </thead>
                        </table>
                    </div><br><br>

                    Tabla de Solicitudes Pases de salida
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-1">Motivo</th>
                                    <th scope="col" class="py-3 px-1">Fecha y Hora</th>
                                    <th scope="col" class="py-3 px-1">Estatus</th>
                                    <th scope="col" class="py-3 px-1">Acciones</th>
                                </tr>
                                <tbody>
                                    @foreach ($solicitudes_p as $solicitud)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                            {{-- <td class="py-4 px-1">{{ $solicitud->id }}</td> --}}
                                            <td class="py-4 px-1 text-center">{{ $solicitud->Motivo }}</td>
                                            <td class="py-4 px-1 text-center">{{ $solicitud->FechaSolicitada . ' ' . $solicitud->HoraSolicitada }}</td>
                                            <td class="py-4 px-1 text-center">Pendiente</td>
                                            <td class="py-4 px-1 text-center">
                                                <a class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" 
                                                href="#">Ver detalles</a>
                                            </td>

                                    @endforeach
                                </tbody>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>