<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ViewsController;


Route::get('/', HomeController::class);

Route::controller(ViewsController::class)->group(function(){
    Route::get('user','index')->name( 'index' );  //    
    Route::get('login','login')->name( 'login' );  // 
    Route::get('registro','registro')->name( 'registro' );  //
    Route::get('solicitud','solicitud')->name( 'solicitud' );  // 
    Route::get('vistasolicitud','vistasolicitud')->name( 'vistasolicitud' );  // 
    Route::get('estadosolicitud','estadosolicitud')->name( 'estadosolicitud' );  // 
    // Route::get('cursos/create','create');
    // Route::get('cursos/{curso}','show');
});

// Route::get('/', function () {
//     return view('welcome');
// });
