<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a 
                        @if(Auth::user()->puesto->Descripcion == 'Docente')
                            href="{{ route('docente.dashboard') }}"
                        @elseif(Auth::user()->puesto->Descripcion == 'Cordinador')
                            href="{{ route('cordinador.dashboard') }}"
                        @elseif(Auth::user()->puesto->Descripcion == 'Administrador')
                            href="{{ route('administrador.dashboard') }}"
                        @elseif(Auth::user()->puesto->Descripcion == 'Director')
                            href="{{ route('director.dashboard') }}"
                        @elseif(Auth::user()->puesto->Descripcion == 'SubDirector')
                            href="{{ route('subdirector.dashboard') }}"
                        @endif
                    >
                    {{-- href="{{ route('dashboard') }}"> --}}
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    {{-- <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link> --}}

                    {{-- Docente --}}
                    @if(Auth::user()->puesto->Descripcion == 'Docente')

                        {{-- Solicitudes --}}
                        <x-nav-link :href="route('docente.dashboard')" :active="request()->routeIs('docente.dashboard')">
                            {{ __('Solicitudes') }}
                        </x-nav-link>

                        {{-- Solicitar Permiso dias economicos --}}
                        <x-nav-link :href="route('docente.solicitud_dias_ecoconimicos')" :active="request()->routeIs('docente.solicitud_dias_ecoconimicos')">
                            {{ __('Solicitar Permiso Para Un Dia Economico') }}
                        </x-nav-link>

                        {{-- Solicitar Permiso pases de salida --}}
                        <x-nav-link :href="route('docente.solicitud_pases_salida')" :active="request()->routeIs('docente.solicitud_pases_salida')">
                        {{ __('Solicitar Permiso Para Un Pase de Salida') }}
                        </x-nav-link>

                    @endif

                    {{-- Cordinador --}}
                    @if(Auth::user()->puesto->Descripcion == 'Cordinador')
                        <x-nav-link :href="route('cordinador.dashboard')" :active="request()->routeIs('cordinador.dashboard')">
                            {{ __('Solicitudes') }}
                        </x-nav-link>

                        <x-nav-link :href="route('cordinador.permisos')" :active="request()->routeIs('cordinador.permisos')">
                            {{ __('Listado de permisos') }}
                        </x-nav-link>
                    @endif

                    {{-- Administrador --}}
                    @if(Auth::user()->puesto->Descripcion == 'Administrador')

                        <x-nav-link :href="route('administrador.dashboard')" :active="request()->routeIs('administrador.dashboard')">
                            {{ __('Usuarios') }}
                        </x-nav-link>

                        <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Nuevo Usuario') }}
                        </x-nav-link>

                        <x-nav-link :href="route('administrador.periodos')" :active="request()->routeIs('administrador.periodos')">
                            {{ __('Periodos') }}
                        </x-nav-link>

                        <x-nav-link :href="route('administrador.periodos.create')" :active="request()->routeIs('administrador.periodos.create')">
                            {{ __('Nuevo Periodo') }}
                        </x-nav-link>
                    @endif

                    {{-- Director --}}
                    @if(Auth::user()->puesto->Descripcion == 'Director')
                        <x-nav-link :href="route('director.dashboard')" :active="request()->routeIs('director.dashboard')">
                            {{ __('Solicitudes') }}
                        </x-nav-link>
                    @endif

                    {{-- SubDirector --}}
                    @if(Auth::user()->puesto->Descripcion == 'SubDirector')
                        <x-nav-link :href="route('subdirector.dashboard')" :active="request()->routeIs('subdirector.dashboard')">
                            {{ __('Solicitudes') }}
                        </x-nav-link>

                        <x-nav-link :href="route('subdirector.create_solicitud_d')" :active="request()->routeIs('subdirector.create_solicitud_d')">
                            {{ __('Dar Permiso') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->Nombre . ' ' . Auth::user()->ApellidoP . ' ' . Auth::user()->ApellidoM}}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            {{-- <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link> --}}

            {{-- Docente --}}
            @if(Auth::user()->puesto->Descripcion == 'Docente')

                {{-- Solicitudes --}}
                <x-responsive-nav-link :href="route('docente.dashboard')" :active="request()->routeIs('docente.dashboard')">
                    {{ __('Solicitudes') }}
                </x-responsive-nav-link>

                {{-- Solicitar Permiso dias economicos --}}
                <x-responsive-nav-link :href="route('docente.solicitud_dias_ecoconimicos')" :active="request()->routeIs('docente.solicitud_dias_ecoconimicos')">
                    {{ __('Solicitar Permiso Para Un Dia Economico') }}
                </x-responsive-nav-link>

                {{-- Solicitar Permiso pases de salida --}}
                <x-responsive-nav-link :href="route('docente.solicitud_pases_salida')" :active="request()->routeIs('docente.solicitud_pases_salida')">
                    {{ __('Solicitar Permiso Para Un Pase de Salida') }}
                </x-responsive-nav-link>
            @endif

            {{-- Cordinador --}}
            @if(Auth::user()->puesto->Descripcion == 'Cordinador')
                <x-responsive-nav-link :href="route('cordinador.dashboard')" :active="request()->routeIs('cordinador.dashboard')">
                    {{ __('Solicitudes') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('cordinador.permisos')" :active="request()->routeIs('cordinador.permisos')">
                    {{ __('Listado de permisos') }}
                </x-responsive-nav-link>
            @endif
            {{-- Administrador --}}
            @if(Auth::user()->puesto->Descripcion == 'Administrador')

                <x-responsive-nav-link :href="route('administrador.dashboard')" :active="request()->routeIs('administrador.dashboard')">
                    {{ __('Usuarios') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Nuevo Usuario') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('administrador.periodos')" :active="request()->routeIs('administrador.periodos')">
                    {{ __('Periodos') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('administrador.periodos.create')" :active="request()->routeIs('administrador.periodos.create')">
                    {{ __('Nuevo Periodo') }}
                </x-responsive-nav-link>
            @endif
            {{-- Director --}}
            @if(Auth::user()->puesto->Descripcion == 'Director')
                <x-responsive-nav-link :href="route('director.dashboard')" :active="request()->routeIs('director.dashboard')">
                    {{ __('Solicitudes') }}
                </x-responsive-nav-link>
            @endif
            {{-- SubDirector --}}
            @if(Auth::user()->puesto->Descripcion == 'SubDirector')
                <x-responsive-nav-link :href="route('subdirector.dashboard')" :active="request()->routeIs('subdirector.dashboard')">
                    {{ __('Solicitudes') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('subdirector.create_solicitud_d')" :active="request()->routeIs('subdirector.create_solicitud_d')">
                    {{ __('Dar Permiso') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
