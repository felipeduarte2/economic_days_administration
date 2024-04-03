<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Departamento;
use App\Models\Periodo;
use App\Models\Personal;
use App\Models\Puesto;
use App\Models\Solicitud;

class ViewsController extends Controller
{
    //Controlador de las rutas del proyecto

    //Página principal del sitio web
    public function index() {return view('vistas.index');} 

    //Página de inicio de sesión
    public function login() {return view('vistas.login');}

    //Página  de registro de usuario
    public function registro() {return view('vistas.registro');} 

    //Página  para realizar una nueva solicitud
    public function solicitud() {return view('vistas.solicitud');}

    // Página para ver la solicitud
    public function vistasolicitud() { return view('vistas.vistasolicitud');}

    //Página para cer el estado de la solicitud
    public function estadosolicitud() {return view('vistas.estadosolicitud');}
}
