<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdministradorController;

// Rutas de administrador
Route::middleware(['auth','admin'])->group(function () {
    Route::get('/administrador.dashboard',[AdministradorController::class, 'dashboard'])->name('administrador.dashboard');
    Route::get('/administrador/register', [AdministradorController::class, 'create'])->name('register');
    Route::post('/administrador/register', [AdministradorController::class, 'store'])->name('register');
    Route::get('/administrador/edit/{user}', [AdministradorController::class, 'edit'])->name('administrador.edit');
    Route::put('/administrador/edit/{user}', [AdministradorController::class, 'update'])->name('administrador.update');
    // Route::get('/administrador/destroy/{user}', [AdministradorController::class, 'destroy'])->name('administrador.destroy');
    Route::get('/administrador/periodos', [AdministradorController::class, 'periodos'])->name('administrador.periodos');
    Route::get('/administrador/periodos/create', [AdministradorController::class, 'createPeriodo'])->name('administrador.periodos.create');
    Route::post('/administrador/periodos/create', [AdministradorController::class, 'storePeriodo'])->name('administrador.periodos.create');
});