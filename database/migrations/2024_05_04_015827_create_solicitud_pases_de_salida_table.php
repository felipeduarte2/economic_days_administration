<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * Crea la tabla solicitud_pases_de_salida con las columnas necesarias para
     * almacenar la información de las solicitudes de permisos para pases de salida.
     */
    public function up(): void
    {
        Schema::create('solicitud_pases_de_salida', function (Blueprint $table) {
            // ID de la solicitud
            $table->id();

            // Motivo de la solicitud
            $table->string('Motivo', 100);

            // Fecha y hora de la solicitud
            $table->dateTime('FechaSolicitud');

            // Fecha y hora solicitadas
            $table->dateTime('FechaSolicitada');
            $table->time('HoraSolicitada');

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

            // Timestamps
            $table->timestamps();
        });
    }




    /**
     * Deshace las migraciones.
     *
     * Elimina la tabla solicitud_pases_de_salida si existe.
     */
    public function down(): void
    {
        // Elimina la tabla 'solicitud_pases_de_salida' si existe
        Schema::dropIfExists('solicitud_pases_de_salida');
    }
};
