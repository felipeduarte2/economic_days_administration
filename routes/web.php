<?php

// use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Backend\AdministradorController;
use App\Http\Controllers\Backend\CordinadorController;
use App\Http\Controllers\Backend\DirectorController;
use App\Http\Controllers\Backend\DocenteController;
use App\Http\Controllers\Backend\SubDirectorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

// Rutas de administrador
Route::middleware(['auth','admin'])->group(function () {
    Route::get('/administrador.dashboard',[AdministradorController::class, 'dashboard'])->name('administrador.dashboard');
    Route::get('/administrador/register', [AdministradorController::class, 'create'])->name('register');
    Route::post('/administrador/register', [AdministradorController::class, 'store'])->name('register');
    Route::get('/administrador/edit/{user}', [AdministradorController::class, 'edit'])->name('administrador.edit');
    Route::put('/administrador/edit/{user}', [AdministradorController::class, 'update'])->name('administrador.update');
});

//Rutas de director
Route::middleware(['auth','director'])->group(function () {
    Route::get('/director.dashboard',[DirectorController::class, 'dashboard'])->name('director.dashboard');
    // 
    Route::get('/director/detalles_d/{solicitud}', [DirectorController::class, 'create_detalles_solicitud_d'])->name('director.detalles_solicitud_d');
    Route::get('/director/detalles_p/{solicitud}', [DirectorController::class, 'create_detalles_solicitud_p'])->name('director.detalles_solicitud_p');
    // 
    Route::put('/director/detalles_d/accept/{solicitud}', [DirectorController::class, 'update_accept_solicitud_d'])->name('director.detalles_solicitud_d.accept');
    Route::put('/director/detalles_d/reject/{solicitud}', [DirectorController::class, 'update_reject_solicitud_d'])->name('director.detalles_solicitud_d.reject');
    // 
    Route::put('/director/detalles_p/accept/{solicitud}', [DirectorController::class, 'update_accept_solicitud_p'])->name('director.detalles_solicitud_p.accept');
    Route::put('/director/detalles_p/reject/{solicitud}', [DirectorController::class, 'update_reject_solicitud_p'])->name('director.detalles_solicitud_p.reject');
});

//Rutas de subdirector
Route::middleware(['auth','subdirector'])->group(function () {
    Route::get('/subdirector.dashboard',[SubDirectorController::class, 'dashboard'])->name('subdirector.dashboard');
    // 
    Route::get('/subdirector/detalles_d/{solicitud}', [SubDirectorController::class, 'create_detalles_solicitud_d'])->name('subdirector.detalles_solicitud_d');
    Route::get('/subdirector/detalles_p/{solicitud}', [SubDirectorController::class, 'create_detalles_solicitud_p'])->name('subdirector.detalles_solicitud_p');
    // 
    Route::put('/subdirector/detalles_d/accept/{solicitud}', [SubDirectorController::class, 'update_accept_solicitud_d'])->name('subdirector.detalles_solicitud_d.accept');
    Route::put('/subdirector/detalles_d/reject/{solicitud}', [SubDirectorController::class, 'update_reject_solicitud_d'])->name('subdirector.detalles_solicitud_d.reject');
    // 
    Route::put('/subdirector/detalles_p/accept/{solicitud}', [SubDirectorController::class, 'update_accept_solicitud_p'])->name('subdirector.detalles_solicitud_p.accept');
    Route::put('/subdirector/detalles_p/reject/{solicitud}', [SubDirectorController::class, 'update_reject_solicitud_p'])->name('subdirector.detalles_solicitud_p.reject');
    //
    Route::get('/subdirector/create_solicitud_d', [SubDirectorController::class, 'create_solicitud_d'])->name('subdirector.create_solicitud_d');
    Route::post('/subdirector/create_solicitud_d', [SubDirectorController::class, 'store_solicitud_d'])->name('subdirector.create_solicitud_d');
});

//Rutas de docente
Route::middleware(['auth','docente'])->group(function () {
    Route::get('/docente.dashboard',[DocenteController::class, 'dashboard'])->name('docente.dashboard');
    // 
    Route::get('/docente/solicitud_dias_ecoconimicos', [DocenteController::class, 'create_solicitud_d'])->name('docente.solicitud_dias_ecoconimicos');
    Route::post('/docente/solicitud_dias_ecoconimicos', [DocenteController::class, 'store_solicitud_d'])->name('docente.solicitud_dias_ecoconimicos');
    // 
    Route::get('/docente/solicitud_pases_salida', [DocenteController::class, 'create_solicitud_p'])->name('docente.solicitud_pases_salida');
    Route::post('/docente/solicitud_pases_salida',[DocenteController::class, 'store_solicitud_p'])->name('docente.solicitud_pases_salida');
    // 
    Route::get('/docente/detalles_d/{solicitud}', [DocenteController::class, 'create_detalles_solicitud_d'])->name('docente.detalles_solicitud_d');
    Route::get('/docente/detalles_p/{solicitud}', [DocenteController::class, 'create_detalles_solicitud_p'])->name('docente.detalles_solicitud_p');
    
});

//Rutas de cordinador
Route::middleware(['auth','cordinador'])->group(function () {
    Route::get('/cordinador.dashboard',[CordinadorController::class, 'dashboard'])->name('cordinador.dashboard');
    // 
    Route::get('/cordinador/detalles_d/{solicitud}', [CordinadorController::class, 'create_detalles_solicitud_d'])->name('cordinador.detalles_solicitud_d');
    Route::get('/cordinador/detalles_p/{solicitud}', [CordinadorController::class, 'create_detalles_solicitud_p'])->name('cordinador.detalles_solicitud_p');
    //
    Route::put('/cordinador/detalles_d/accept/{solicitud}', [CordinadorController::class, 'update_accept_solicitud_d'])->name('cordinador.detalles_solicitud_d.accept');
    Route::put('/cordinador/detalles_d/reject/{solicitud}', [CordinadorController::class, 'update_reject_solicitud_d'])->name('cordinador.detalles_solicitud_d.reject');
    // 
    Route::put('/cordinador/detalles_p/accept/{solicitud}', [CordinadorController::class, 'update_accept_solicitud_p'])->name('cordinador.detalles_solicitud_p.accept');
    Route::put('/cordinador/detalles_p/reject/{solicitud}', [CordinadorController::class, 'update_reject_solicitud_p'])->name('cordinador.detalles_solicitud_p.reject');
    // 
    Route::get('/cordinador/permisos', [CordinadorController::class, 'permisos'])->name('cordinador.permisos');
    Route::get('/cordinador/permisos/pdf', [CordinadorController::class, 'permisos_pdf'])->name('cordinador.pdf');
});