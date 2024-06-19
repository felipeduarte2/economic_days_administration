<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detalles
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Detalles de la solicitud <br><br>
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-1">Informaci&oacute;n</th>
                                    <th scope="col" class="py-3 px-1">Detalle</th>
                                </tr>
                            </thead>
                            <tbody>

                                {{-- Motivo --}}
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-1 text-center">Motivo</td>
                                    <td class="py-4 px-1 text-center">{{ $solicitud->Motivo}}</td>
                                </tr >

                                {{-- Fecha de la solicitud --}}
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-1 text-center">Fecha</td>
                                    <td class="py-4 px-1 text-center">
                                        {{ date('d-m-Y', strtotime($solicitud->FechaSolicitada)) }}
                                    </td>
                                </tr>

                                {{-- HoraSolicitada --}}
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-1 text-center">Hora</td>
                                    <td class="py-4 px-1 text-center">
                                        {{ date('H:i', strtotime($solicitud->HoraSolicitada)) }}
                                    </td>
                                </tr>

                                {{-- Observaciones --}}
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-1 text-center">Observaciones</td>
                                    <td class="py-4 px-1 text-center">
                                        {{-- Mostrar obserbaciones si no es nullo --}}
                                        @if($solicitud->Observaciones != null)
                                            {{ $solicitud->Observaciones}}
                                        @else
                                            Sin observaciones
                                        @endif
                                    </td>
                                </tr>

                                {{-- Validaciones --}}
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-1 text-center">Director</td>
                                    <td class="py-4 px-1 text-center">
                                        @if($solicitud->Validacion1 === null)
                                            Pendiente
                                        @elseif($solicitud->Validacion1 == true)
                                            Aceptado
                                        @elseif($solicitud->Validacion1 == false)
                                            Rechazado
                                        @endif
                                    </td>
                                </tr>

                                {{-- Validaciones --}}
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-1 text-center">SubDirector</td>
                                    <td class="py-4 px-1 text-center">
                                        @if($solicitud->Validacion2 === null)
                                            Pendiente
                                        @elseif($solicitud->Validacion2 == true)
                                            Aceptado
                                        @elseif($solicitud->Validacion2 == false)
                                            Rechazado
                                        @endif
                                    </td>
                                </tr>

                                {{-- Validaciones --}}
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-1 text-center">Cordinador</td>
                                    <td class="py-4 px-1 text-center">
                                        @if($solicitud->Validacion3 === null)
                                            Pendiente
                                        @elseif($solicitud->Validacion3 == true)
                                            Aceptado
                                        @elseif($solicitud->Validacion3 == false)
                                            Rechazado
                                        @endif
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div><br><br>

                        <a 
                        class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" 
                        href="{{ route('docente.dashboard') }} "
                        >Aceptar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>