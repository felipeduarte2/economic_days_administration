<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Periodos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    Periodos <br>
                    {{-- Tabla de Periodos mostra si hay periodos --}}

                    {{-- Tabla de Usuarios mostra si hay usuarios --}}
                    @if (count($periodos) > 0)
                    <div class="overflow-x-auto w-full relative shadow-md sm:rounded-lg">
                        <table id="usuarios" class="w-full text-base text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-1">Periodo</th>
                                    <th scope="col" class="py-3 px-1">Fecha de inicio</th>
                                    <th scope="col" class="py-3 px-1">Fecha final</th>
                                    {{-- <th scope="col" class="py-3 px-1">Acciones</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($periodos as $periodo)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="py-4 px-1">{{ $periodo->descripcion }}</td>
                                        <td class="py-4 px-1 text-center">{{ date('d-m-Y', strtotime($periodo->fecha_inicio)) }}</td>
                                        <td class="py-4 px-1 text-center">{{ date('d-m-Y', strtotime($periodo->fecha_fin)) }}</td>
                                        {{-- <td class="py-4 px-1 text-center">
                                            <a class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                            href="{{ route('administrador.edit', $user->id) }}">Editar</a>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><br>

                    {{-- Paginacion de registros de usuarios --}}
                    {{ $periodos->links() }}

                    @else
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="bg-white dark:bg-gray-800 container shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <p>No hay registros</p>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

</x-app-layout>