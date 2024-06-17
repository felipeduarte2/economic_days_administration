<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ingresar nuevo usuario') }}
        </h2>
    </x-slot>

    <div class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                    
                            <!-- Codigo_empleado -->
                            <div>
                                <x-input-label for="Codigo_empleado">Codigo de Empleado</x-input-label>
                                <x-text-input id="Codigo_empleado" class="block mt-1 w-full" type="text" name="Codigo_empleado" :value="old('Codigo_empleado')" autofocus />
                                <x-input-error :messages="$errors->get('Codigo_empleado')" class="mt-2" />
                            </div>
                    
                            <!-- Nombre -->
                            <div>
                                <x-input-label for="Nombre" :value="__('Nombre')" />
                                <x-text-input id="Nombre" class="block mt-1 w-full" type="text" name="Nombre" :value="old('Nombre')" />
                                <x-input-error :messages="$errors->get('Nombre')" class="mt-2" />
                            </div>
                    
                            <!-- ApellidoP -->
                            <div>
                                <x-input-label for="ApellidoP" >Apellido Paterno</x-input-label>
                                <x-text-input id="ApellidoP" class="block mt-1 w-full" type="text" name="ApellidoP" :value="old('ApellidoP')" />
                                <x-input-error :messages="$errors->get('ApellidoP')" class="mt-2" />
                            </div>
                    
                            <!-- ApellidoM -->
                            <div>
                                <x-input-label for="ApellidoM">Apellido Materno</x-input-label>
                                <x-text-input id="ApellidoM" class="block mt-1 w-full" type="text" name="ApellidoM" :value="old('ApellidoM')" />
                                <x-input-error :messages="$errors->get('ApellidoM')" class="mt-2" />
                            </div>
                    
                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- IdPuesto -->
                            <div class="mt-4">
                                <x-input-label for="IdPuesto"  >Puesto</x-input-label>
                                <x-select id="IdPuesto" name="IdPuesto" class="block mt-1 w-full" required>
                                    @foreach ($puestos as $puesto)
                                        <option 
                                        {{-- si $departamento->Descripcion es Docente poner selected --}}
                                        {{ $puesto->Descripcion == 'Docente' ? 'selected' : '' }}
                                        value="{{ $puesto->IdPuesto }}">{{ $puesto->Descripcion }}</option>
                                    @endforeach
                                </x-select>
                                <x-input-error :messages="$errors->get('IdPuesto')" class="mt-2" />
                            </div>

                            <!-- IdDepartamento -->
                            {{-- Solo mostrar cuando el select anterior de IdPuesto se 4 o 5 --}}
                            {{-- <div class="mt-4" id="departamento" style="display: none">
                            </div> --}}

                            <div class="mt-4">
                                <x-input-label for="IdDepartamento">Departamento</x-input-label>
                                <x-select id="IdDepartamento" name="IdDepartamento" class="block mt-1 w-full" required>
                                    @foreach ($departamentos as $departamento)
                                        <option value="{{ $departamento->IdDepartamento }}">{{ $departamento->Descripcion }}</option>
                                    @endforeach
                                </x-select>
                                <x-input-error :messages="$errors->get('IdDepartamento')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
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
