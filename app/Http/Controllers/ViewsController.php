<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    //Controlador de las rutas del proyecto
    public function index() {return view('vistas.index');}                      //Página principal del sitio web
    public function login() {return view('vistas.login');}                      //Página de inicio de sesión
    public function registro() {return view('vistas.registro');}                //Página  de registro de usuario
    public function solicitud() {return view('vistas.solicitud');}              //Página  para realizar una nueva solicitud
    public function vistasolicitud() { return view('vistas.vistasolicitud');}   // Página para ver la solicitud
    public function estadosolicitud() {return view('vistas.estadosolicitud');}  //Página para cer el estado de la solicitud
}
