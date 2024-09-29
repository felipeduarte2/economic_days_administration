<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if(auth()->user()->puesto->Descripcion === 'Docente') return redirect()->route('docente.dashboard');
    if(auth()->user()->puesto->Descripcion === 'Administrador') return redirect()->route('administrador.dashboard');
    if(auth()->user()->puesto->Descripcion === 'Cordinador') return redirect()->route('cordinador.dashboard');
    if(auth()->user()->puesto->Descripcion === 'SubDirector') return redirect()->route('subdirector.dashboard');
    if(auth()->user()->puesto->Descripcion === 'Director') return redirect()->route('director.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Rutas de administrador
require __DIR__.'/administrador.php';

//Rutas de subdirector
require __DIR__.'/subdirector.php';

//Rutas de docente
require __DIR__.'/docente.php';

//Rutas de cordinador
require __DIR__.'/cordinador.php';