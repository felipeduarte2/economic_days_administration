<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Esta migración crea la tabla 'solicitud' en la base de datos.

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id('IdSolicitud');
            $table->string('Motivo', 100);
            $table->dateTime('FechaSolicitud');
            $table->dateTime('FechaSolicitada');
            $table->unsignedBigInteger('IdPersonal');
            $table->boolean('Validacion1');
            $table->boolean('Validacion2');
            $table->boolean('Validacion3');
            $table->dateTime('FechaValida1')->nullable();
            $table->dateTime('FechaValida2')->nullable();
            $table->dateTime('FechaValida3')->nullable();
            $table->boolean('Aprolondo');
            $table->boolean('Cancelacion');
            $table->string('Observaciones', 500)->nullable();
            $table->unsignedBigInteger('IdPeriodo');
            $table->foreign('IdPersonal')->references('IdPersonal')->on('personals');
            $table->foreign('IdPeriodo')->references('IdPeriodo')->on('periodos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Si la tabla 'solicitud' existe, será eliminada.
        Schema::dropIfExists('solicituds');
    }
};