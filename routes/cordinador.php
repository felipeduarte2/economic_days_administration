<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CordinadorController;

Route::middleware(['auth','cordinador'])->group(function () {
    Route::get('/coordinador.dashboard',[CordinadorController::class, 'dashboard'])->name('cordinador.dashboard');
    // 
    Route::get('/coordinador/detalles_d/{solicitud}', [CordinadorController::class, 'create_detalles_solicitud_d'])->name('cordinador.detalles_solicitud_d');
    Route::get('/coordinador/detalles_p/{solicitud}', [CordinadorController::class, 'create_detalles_solicitud_p'])->name('cordinador.detalles_solicitud_p');
    //
    Route::put('/coordinador/detalles_d/accept/{solicitud}', [CordinadorController::class, 'update_accept_solicitud_d'])->name('cordinador.detalles_solicitud_d.accept');
    Route::put('/coordinador/detalles_d/reject/{solicitud}', [CordinadorController::class, 'update_reject_solicitud_d'])->name('cordinador.detalles_solicitud_d.reject');
    // 
    Route::put('/coordinador/detalles_p/accept/{solicitud}', [CordinadorController::class, 'update_accept_solicitud_p'])->name('cordinador.detalles_solicitud_p.accept');
    Route::put('/cordinador/detalles_p/reject/{solicitud}', [CordinadorController::class, 'update_reject_solicitud_p'])->name('cordinador.detalles_solicitud_p.reject');
    // 
    Route::get('/coordinador/permisos', [CordinadorController::class, 'permisos'])->name('cordinador.permisos');
    Route::get('/coordinador/permisos/pdf', [CordinadorController::class, 'permisos_pdf'])->name('cordinador.pdf');
    Route::get('/coordinador/permisos/fecha', [CordinadorController::class, 'search'])->name('cordinador.permisos.fecha');
});
