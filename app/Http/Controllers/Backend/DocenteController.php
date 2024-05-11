<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    //
    public function dashboard(){
        return view('docente.dashboard');
    }
}
