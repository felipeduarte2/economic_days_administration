<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ViewsController;


Route::get('/', HomeController::class);

Route::controller(ViewsController::class)->group(function(){
    Route::get('user','index');
    Route::get('login','login');
    Route::get('registro','registro');
    Route::get('solicitud','solicitud');
    Route::get('vistasolicitud','vistasolicitud');
    Route::get('estadosolicitud','estadosolicitud');
    // Route::get('cursos/create','create');
    // Route::get('cursos/{curso}','show');
});

// Route::get('/', function () {
//     return view('welcome');
// });
