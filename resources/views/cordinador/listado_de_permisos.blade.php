<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- {{ __('Solicitudes') }} --}}
            Listado de Permisos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("You're logged in!") }} --}}

                    {{-- Tabla de solicitudes $solicitudes --}}
                    <h3 class="text-2xl font-bold">Permisos del periodo {{$periodo->descripcion}}
                    </h3><br>
                    @if (count($solicitudes) > 0)

                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-1">Codig&oacute; de empleado</th>
                                    <th scope="col" class="py-3 px-1">Nombre</th>
                                    <th scope="col" class="py-3 px-1">Motivo</th>
                                    <th scope="col" class="py-3 px-1">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($solicitudes as $solicitud)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="py-4 px-1 text-center">{{ $solicitud->user->Codigo_empleado }}</td>
                                        <td class="py-4 px-1 text-center">
                                            {{ $solicitud->user->ApellidoP }}
                                            {{ $solicitud->user->ApellidoM }}
                                            {{ $solicitud->user->Nombre }}
                                        </td>
                                        <td class="py-4 px-1 text-center">{{ $solicitud->Motivo }}</td>
                                        <td class="py-4 px-1 text-center">{{ date('d-m-Y', strtotime($solicitud->FechaSolicitada)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p>No hay registros</p>
                    @endif
                    <br><br>

                    <form action="{{ route('cordinador.permisos.fecha')}}" method="POST">
                        @csrf
                        @method('GET')
                        {{-- fecha start --}}
                        Imprimir listado de permisos
                        <label for="start"> del</label>
                        <input type="date" name="start" id="start" class="border border-gray mt-4
                        300 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray rounded-md 
                        @error('start') is-invalid @enderror" >

                        <label for="end">al</label>
                        <input type="date" name="end" id="end" class="border border-gray mt-4
                        300 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray rounded-md 
                        @error('end') is-invalid @enderror" >

                        <x-primary-button class="ml-4 mt-4">
                            {{ __('Imprimir') }}
                        </x-primary-button>

                    </form>

                    {{-- boton imprimir --}}
                    <a 
                    href={{ route('cordinador.pdf')}}
                    class="ml-4 mt-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                    >Imprimir listado {{$periodo->descripcion}}</a>
                    <br><br>


                    {{-- paginacion de $solicitudes --}}
                    <br>{{ $solicitudes->links() }}

                </div>
            </div>
        </div>
    </div>

</x-app-layout>