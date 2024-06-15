<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detalles
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-1">Informaci&oacute;n</th>
                                    <th scope="col" class="py-3 px-1">Detalle</th>
                                </tr>
                            </thead>
                            <tbody>

                                {{-- Usuario --}}
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-1 text-center">Nombre</td>
                                    <td class="py-4 px-1 text-center">{{ 
                                        $solicitud->user->ApellidoP. ' ' . $solicitud->user->ApellidoM. ' ' . $solicitud->user->Nombre}}</td>
                                </tr>

                                {{-- Departamento --}}
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-1 text-center">Departamento</td>
                                    <td class="py-4 px-1 text-center">{{ $solicitud->user->departamento->Descripcion }}</td>
                                </tr>

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

                            </tbody>
                        </table>
                    </div><br>

                    {{-- Botonenes de Aceptar Y Rechazar --}}
                    <div class="flex items-center justify-end mt-4">

                        <form method="POST" action="{{ route('director.detalles_solicitud_p.accept', $solicitud) }}">
                            @csrf
                            @method('put')

                            <x-primary-button class="ml-4">
                                {{ __('Aceptar') }}
                            </x-primary-button>
                        </form>

                        <form method="POST" action="{{ route('director.detalles_solicitud_p.reject', $solicitud) }}">
                            @csrf
                            @method('put')

                            <x-primary-button class="ml-4">
                                {{ __('Rechazar') }}
                            </x-primary-button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>