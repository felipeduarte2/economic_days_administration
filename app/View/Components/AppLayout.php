<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Este método devuelve la vista/contenido del componente.
     *
     * @return \Illuminate\View\View La vista del layout de la aplicación.
     */
    public function render(): View
    {
        // Retornamos la vista del layout de la aplicación.
        return view('layouts.app');
    }
}
