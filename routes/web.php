<?php

// use App\Http\Controllers\Auth\RegisteredUserController;
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
    Route::get('/administrador/register', [AdministradorController::class, 'create'])->name('register');
    Route::post('/administrador/register', [AdministradorController::class, 'store'])->name('register');
    // Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('/administrador/edit/{user}', [AdministradorController::class, 'edit'])->name('administrador.edit');
    Route::put('/administrador/edit/{user}', [AdministradorController::class, 'update'])->name('administrador.update');
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
    Route::get('/docente/solicitud_dias_ecoconimicos', [DocenteController::class, 'create_solicitud_d'])->name('docente.solicitud_dias_ecoconimicos');
    Route::post('/docente/solicitud_dias_ecoconimicos', [DocenteController::class, 'store_solicitud_d'])->name('docente.solicitud_dias_ecoconimicos');
    Route::get('/docente/solicitud_pases_salida', [DocenteController::class, 'create_solicitud_p'])->name('docente.solicitud_pases_salida');
    Route::post('/docente/solicitud_pases_salida', [DocenteController::class, 'store_solicitud_p'])->name('docente.solicitud_pases_salida');
});

//Rutas de cordinador
Route::middleware(['auth','cordinador'])->group(function () {
    Route::get('/cordinador.dashboard',[CordinadorController::class, 'dashboard'])->name('cordinador.dashboard');
});