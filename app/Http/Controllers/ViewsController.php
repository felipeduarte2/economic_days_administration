<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    //Controlador de las rutas del proyecto
    public function index() {return "index";}
    public function login() {return "Login";}
    public function registro() {return "Registro";}
    public function solicitud() {return "Solicitud";}
    public function vistasolicitud() { return "Vista de la solicitud";}
    public function estadosolicitud() {return "Estado solicitud";}
}
