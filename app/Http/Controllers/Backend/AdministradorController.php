<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    //
    public function dashboard(){
        return view('administrador.dashboard');
    }
}
