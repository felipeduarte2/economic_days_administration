<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    {{ 'Bienbenido ' . Auth::user()->Nombre  . ' ' . Auth::user()->ApellidoP }}
                </div>
            </div>
        </div>
    </div> --}}

    <div class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        {{-- <x-primary-button class="ml-4" onclick="{{ route('solicitud_d') }} ">
                            Solicitar Permiso dias economicos
                        </x-primary-button>
                        <br>
                        <x-primary-button class="ml-4" onclick="{{ route('solicitud_p') }} ">
                            Solicitar Permiso pases de salida 
                        </x-primary-button> --}}
                        <a 
                        class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" 
                        href="{{ route('solicitud_d') }} "
                        >Solicitar Permiso dias economicos</a>

                        <a 
                        class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" 
                        href="{{ route('solicitud_p') }} "
                        >Solicitar Permiso pases de salida</a>

                        <!-- {{ (Auth::user()->puesto->Descripcion == 'Administrador') ? `<x-button></x-button>` : `` }} -->
                        
                        {{-- '<p>si</p>' : '<p>no</p>'}} --}}
                        {{-- <a 
                        class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" 
                        href="{{ route('register') }} "
                        >Registrar Nuevo Personal</a> --}}
                        

                        {{-- {{Auth::user()->puesto}} --}}

                    
                        
                        {{-- <x-a-button class="ml-4" href=""{{ route('solicitud_d') }} "">
                            Solicitar Permiso dias economicos
                        </x-a-button> --}}
                        {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            
                            <div class="max-w-xl">

                                <div class="'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'">
                                    <button class=" m-1 cursor-pointer transition-all bg-blue-500 text-white px-6 py-2 rounded-lg
                                        border-blue-600
                                        border-b-[4px] hover:brightness-110 hover:-translate-y-[1px] hover:border-b-[6px]
                                        active:border-b-[2px] active:brightness-90 active:translate-y-[2px]">
                                    Solicitar Permiso dias economicos
                                    </button>
                                </div>

                                <br>

                                <div class="'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'">
                                    <button class="cursor-pointer transition-all bg-blue-500 text-white px-6 py-2 rounded-lg
                                    border-blue-600
                                    border-b-[4px] hover:brightness-110 hover:-translate-y-[1px] hover:border-b-[6px]
                                    active:border-b-[2px] active:brightness-90 active:translate-y-[2px]">
                                Solicitar Permiso pases de salida
                                </button>
                                </div>
                                
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Boton de prueba --}}
    {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
            <button class="cursor-pointer transition-all bg-blue-500 text-white px-6 py-2 rounded-lg
                border-blue-600
                border-b-[4px] hover:brightness-110 hover:-translate-y-[1px] hover:border-b-[6px]
                active:border-b-[2px] active:brightness-90 active:translate-y-[2px]">
            Solicitar Permiso dias economicos
            </button>

            <button class="cursor-pointer transition-all bg-blue-500 text-white px-6 py-2 rounded-lg
                border-blue-600
                border-b-[4px] hover:brightness-110 hover:-translate-y-[1px] hover:border-b-[6px]
                active:border-b-[2px] active:brightness-90 active:translate-y-[2px]">
            Solicitar Permiso pases de salida
            </button>
            </div>
        </div>
    </div> --}}

    {{-- Enviar solicitud --}}
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>hola</p>
                </div>
            </div>
        </div>
    </div> --}}

</x-app-layout>
