<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * @return void
     */
    public function up(): void
    {
        // Crea la tabla solicitud_dias_ecoconimicos
        Schema::create('solicitud_dias_ecoconimicos', function (Blueprint $table) {
            // Columnas de la tabla
            $table->id(); // ID de la solicitud
            $table->string('Motivo', 100); // Motivo de la solicitud
            $table->dateTime('FechaSolicitud'); // Fecha de la solicitud
            $table->dateTime('FechaSolicitada'); // Fecha solicitada
            $table->boolean('Validacion1')->nullable(); // Validacion 1
            $table->boolean('Validacion2')->nullable(); // Validacion 2
            $table->boolean('Validacion3')->nullable(); // Validacion 3
            $table->dateTime('FechaValida1')->nullable(); // Fecha de validación 1
            $table->dateTime('FechaValida2')->nullable(); // Fecha de validación 2
            $table->dateTime('FechaValida3')->nullable(); // Fecha de validación 3
            $table->boolean('Aprobacion')->nullable(); // Aprobación
            $table->boolean('Cancelacion')->nullable(); // Cancelación
            $table->string('Observaciones', 500)->nullable(); // Observaciones
            $table->unsignedBigInteger('user_id'); // ID del usuario que realizó la solicitud
            $table->unsignedBigInteger('IdPeriodo'); // ID del período asociado a la solicitud
            
            // Claves foráneas
            $table->foreign('user_id')->references('id')->on('users');// Restricciones de integridad referenciales con la tabla users
            $table->foreign('IdPeriodo')->references('IdPeriodo')->on('periodos');// Restricciones de integridad referenciales con la tabla periodos
            
            // Timestamps
            $table->timestamps();
        });
    }





    /**
     * Reversa las migraciones.
     *
     * @return void
     */
    public function down(): void
    {
        // Destructuye la tabla solicitud_dias_ecoconimicos
        Schema::dropIfExists('solicitud_dias_ecoconimicos');
    }
};
