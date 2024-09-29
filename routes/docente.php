<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DocenteController;

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