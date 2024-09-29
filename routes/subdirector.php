<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SubDirectorController;

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