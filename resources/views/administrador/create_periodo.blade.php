<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ingresar nuevo periodo') }}
        </h2>
    </x-slot>

    <div class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <form method="POST" action="{{ route('administrador.periodos.create') }}">
                            @csrf

                            {{-- descipcion --}}
                            <div>
                                <x-input-label for="descripcion" :value="__('Periodo')" />
                                <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" :value="old('descripcion')" autofocus />
                                <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                            </div>
                            
                            {{-- fecha_inicio --}}
                            <div>
                                <x-input-label for="fecha_inicio" :value="__('Fecha de inicio')" />
                                <x-text-input id="fecha_inicio" class="block mt-1 w-full" type="date" name="fecha_inicio" :value="old('fecha_inicio')" autofocus />
                                <x-input-error :messages="$errors->get('fecha_inicio')" class="mt-2" />
                            </div>
                            
                            {{-- fecha_fin --}}
                            <div>
                                <x-input-label for="fecha_fin" :value="__('Fecha final')" />
                                <x-text-input id="fecha_fin" class="block mt-1 w-full" type="date" name="fecha_fin" :value="old('fecha_fin')" autofocus />
                                <x-input-error :messages="$errors->get('fecha_fin')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">

                                <a 
                                class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" 
                                href="{{ route('administrador.dashboard') }} "
                                >Cancelar</a>
                                
                                <x-primary-button class="ms-4">
                                    {{-- {{ __('Register') }} --}}
                                    Registrar
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
