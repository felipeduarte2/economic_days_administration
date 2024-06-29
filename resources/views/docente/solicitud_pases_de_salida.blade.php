<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Solicitud de Permiso Pases de Salida
        </h2>
    </x-slot>

    <div class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                <form method="POST" action="{{ route('docente.solicitud_pases_salida') }}">
                                    @csrf

                                    {{-- Motivo --}}
                                    <div>
                                        <x-input-label for="Motivo">Motivo</x-input-label>
                                        <x-text-input id="Motivo" class="block mt-1 w-full" type="text" name="Motivo" :value="old('Motivo')" autofocus />
                                        <x-input-error class="mt-2" :messages="$errors->get('Motivo')" />
                                    </div>

                                    {{-- Fecha solicitada --}}
                                    <div>
                                        <x-input-label for="Fecha"> Fecha Solicitada</x-input-label>
                                        <x-text-input id="Fecha" class="block mt-1 w-full" type="date" name="Fecha" :value="old('Fecha')" autofocus />
                                        <x-input-error class="mt-2" :messages="$errors->get('Fecha')" />
                                    </div>

                                    {{-- Hora solicitada --}}
                                    <div>
                                        <x-input-label for="Hora"> Hora Solicitada</x-input-label>
                                        <x-text-input id="Hora" class="block mt-1 w-full" type="time" name="Hora" :value="old('Hora')" autofocus />
                                        <x-input-error class="mt-2" :messages="$errors->get('Hora')" />
                                    </div>

                                    {{-- Observaciones --}}
                                    <div>
                                        <x-input-label for="Observaciones">Observaciones</x-input-label>
                                        <x-text-input id="Observaciones" class="block mt-1 w-full" type="text" name="Observaciones" :value="old('Observaciones')" autofocus />
                                        <x-input-error class="mt-2" :messages="$errors->get('Observaciones')" />
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <x-primary-button class="ml-4">
                                            {{ __('Solicitar') }}
                                        </x-primary-button>

                                        <a class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" 
                                        href="{{ route('docente.dashboard') }}">{{ __('Cancelar') }}</a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>