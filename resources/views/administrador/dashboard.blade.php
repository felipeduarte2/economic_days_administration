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

                    {{-- {{ 'Bievenido ' . Auth::user()->Nombre  . ' ' . Auth::user()->ApellidoP }}
                    Se ha logiado como Administrador --}}

                    <div class="container mb-4">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                    <a 
                                    class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" 
                                    href="{{ route('register') }} "
                                    >Ingresar nuevo usuario</a>

                                    {{-- <a 
                                    class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" 
                                    href="{{ route('solicitud_p') }} "
                                    >Ingresar nuevo usuario</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Tabla de usuarios --}}
                    <div class='flex min-h-screen items-center justify-center from-purple-200 via-purple-300 to-purple-500 bg-gradient-to-br'>
                        <div class="flex items-center justify-center min-h-[450px]">
                            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                                    <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="py-3 px-1">Codigo Empleado</th>
                                                <th scope="col" class="py-3 px-1">Nombre</th>
                                                {{-- <th scope="col" class="py-3 px-6">Apellido Paterno</th>
                                                <th scope="col" class="py-3 px-6">Apellido Materno</th> --}}
                                                <th scope="col" class="py-3 px-1">Correo</th>
                                                <th scope="col" class="py-3 px-1">Departamento</th>
                                                <th scope="col" class="py-3 px-1">Puesto</th>
                                                <th scope="col" class="py-3 px-1">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-1">{{ $user->Codigo_empleado }}</td>
                                                    <td class="py-4 px-1">{{ $user->ApellidoP . ' ' . $user->ApellidoM . ' ' . $user->Nombre }}</td>
                                                    {{-- <td class="py-4 px-2">{{ $user->ApellidoP }}</td>
                                                    <td class="py-4 px-2">{{ $user->ApellidoM }}</td> --}}
                                                    <td class="py-4 px-1">{{ $user->email }}</td>
                                                    <td class="py-4 px-1">{{ $user->departamento->Descripcion }}</td>
                                                    <td class="py-4 px-1">{{ $user->puesto->Descripcion }}</td>
                                                    <td class="ml-4 mt-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                        <a href="{{ route('administrador.edit', $user->id) }}">Editar</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</x-app-layout>
