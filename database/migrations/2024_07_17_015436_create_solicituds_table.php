<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * Crea la tabla solicituds con las columnas necesarias para
     * almacenar la información de las solicitudes de permisos para pases de salida.
     */
    public function up(): void
    {
        Schema::create('solicituds', function (Blueprint $table) {
            // ID de la solicitud
            $table->id();

            // tipos de solicitud 
            $table->string('tipo_solicitud', 20);

            // Motivo de la solicitud
            $table->string('Motivo', 100);

            // Fecha y hora de la solicitud
            $table->dateTime('FechaSolicitud');

            // Fecha y hora solicitadas
            $table->dateTime('FechaSolicitada');
            $table->time('HoraSolicitada')->nullable();

            // Validaciones
            $table->boolean('Validacion1')->nullable();
            $table->boolean('Validacion2')->nullable();
            $table->boolean('Validacion3')->nullable();

            // Fechas de validación
            $table->dateTime('FechaValida1')->nullable();
            $table->dateTime('FechaValida2')->nullable();
            $table->dateTime('FechaValida3')->nullable();

            // Aprobación y cancelación
            $table->boolean('Aprobacion')->nullable();
            $table->boolean('Cancelacion')->nullable();

            // Observaciones
            $table->string('Observaciones', 500)->nullable();

            // ID del usuario que realizó la solicitud
            $table->unsignedBigInteger('user_id');
            // Relación con la tabla users
            $table->foreign('user_id')->references('id')->on('users');

            // ID del período asociado a la solicitud
            $table->unsignedBigInteger('IdPeriodo');
            // Relación con la tabla periodos
            $table->foreign('IdPeriodo')->references('IdPeriodo')->on('periodos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicituds');
    }
};
