<?php

use App\Http\Controllers\Backend\AdministradorController;
use App\Http\Controllers\Backend\CordinadorController;
use App\Http\Controllers\Backend\DirectorController;
use App\Http\Controllers\Backend\DocenteController;
use App\Http\Controllers\Backend\SubDirectorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(ViewsController::class)->group(function(){
    Route::get('/solicitud','solicitud')->middleware(['auth', 'verified'])->name( 'solicitud' );
});
require __DIR__.'/auth.php';

// Rutas de administrador
Route::middleware(['auth','admin'])->group(function () {
    Route::get('/administrador.dashboard',[AdministradorController::class, 'dashboard'])->name('administrador.dashboard');
});

//Rutas de director
Route::middleware(['auth','director'])->group(function () {
    Route::get('/director.dashboard',[DirectorController::class, 'dashboard'])->name('director.dashboard');
});

//Rutas de subdirector
Route::middleware(['auth','subdirector'])->group(function () {
    Route::get('/subdirector.dashboard',[SubDirectorController::class, 'dashboard'])->name('subdirector.dashboard');
});

//Rutas de docente
Route::middleware(['auth','docente'])->group(function () {
    Route::get('/docente.dashboard',[DocenteController::class, 'dashboard'])->name('docente.dashboard');
});

//Rutas de cordinador
Route::middleware(['auth','cordinador'])->group(function () {
    Route::get('/cordinador.dashboard',[CordinadorController::class, 'dashboard'])->name('cordinador.dashboard');
});