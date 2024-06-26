<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        //$middleware->add('App\Http\Middleware\ExampleMiddleware');
        $middleware->alias([
            'admin' => App\Http\Middleware\Administrador::class,
            'docente' => App\Http\Middleware\Docente::class,
            'subdirector' => App\Http\Middleware\SubDirector::class,
            'director' => App\Http\Middleware\Director::class,
            'cordinador' => App\Http\Middleware\Cordinador::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

    $app->register(\Barryvdh\DomPDF\ServiceProvider::class);
    // $app->register(\Yajra\DataTables\DataTablesServiceProvider::class);
    $app->configure('dompdf');
