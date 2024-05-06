<x-guest-layout>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Codigo_empleado -->
        <div>
            <x-input-label for="Codigo_empleado" :value="__('Codigo_empleado')" />
            <x-text-input id="Codigo_empleado" class="block mt-1 w-full" type="text" name="Codigo_empleado" :value="old('Codigo_empleado')" autofocus required/>
            <x-input-error :messages="$errors->get('Codigo_empleado')" class="mt-2" />
        </div>

        <!-- Nombre -->
        <div>
            <x-input-label for="Nombre" :value="__('Nombre')" />
            <x-text-input id="Nombre" class="block mt-1 w-full" type="text" name="Nombre" :value="old('Nombre')" required/>
            <x-input-error :messages="$errors->get('Nombre')" class="mt-2" />
        </div>

        <!-- ApellidoP -->
        <div>
            <x-input-label for="ApellidoP" :value="__('ApellidoP')" />
            <x-text-input id="ApellidoP" class="block mt-1 w-full" type="text" name="ApellidoP" :value="old('ApellidoP')" required/>
            <x-input-error :messages="$errors->get('ApellidoP')" class="mt-2" />
        </div>

        <!-- ApellidoM -->
        <div>
            <x-input-label for="ApellidoM" :value="__('ApellidoM')" />
            <x-text-input id="ApellidoM" class="block mt-1 w-full" type="text" name="ApellidoM" :value="old('ApellidoM')" required/>
            <x-input-error :messages="$errors->get('ApellidoM')" class="mt-2" />
        </div>

        <!-- Name -->
        {{-- <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div> --}}

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- IdDepartamento -->
        <div class="mt-4">
            <x-input-label for="IdDepartamento">Departamento</x-input-label>
            <x-select id="IdDepartamento" name="IdDepartamento" class="block mt-1 w-full" required>
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->IdDepartamento }}">{{ $departamento->Descripcion }}</option>
                @endforeach
            </x-select>
            <x-input-error :messages="$errors->get('IdDepartamento')" class="mt-2" />
        </div>

        <!-- IdPuesto -->
        <div class="mt-4">
            <x-input-label for="IdPuesto"  >Puesto</x-input-label>
            <x-select id="IdPuesto" name="IdPuesto" class="block mt-1 w-full" required>
                @foreach ($puestos as $puesto)
                    <option value="{{ $puesto->IdPuesto }}">{{ $puesto->Descripcion }}</option>
                @endforeach
            </x-select>
            <x-input-error :messages="$errors->get('IdPuesto')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
