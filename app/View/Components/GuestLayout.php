<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Obtiene la vista/contenido que representa el componente.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        // Devuelve la vista 'layouts.guest' que se encargará de mostrar 
        // el diseño de la página para usuarios invitados.
        return view('layouts.guest');
    }
}
