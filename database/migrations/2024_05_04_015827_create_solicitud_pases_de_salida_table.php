<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('solicitud_pases_de_salida', function (Blueprint $table) {
            $table->id();
            $table->string('Motivo', 100);
            $table->dateTime('FechaSolicitud');
            $table->dateTime('FechaSolicitada');
            $table->time('HoraSolicitada');
            $table->boolean('Validacion1')->nullable();
            $table->boolean('Validacion2')->nullable();
            $table->boolean('Validacion3')->nullable();
            $table->dateTime('FechaValida1')->nullable();
            $table->dateTime('FechaValida2')->nullable();
            $table->dateTime('FechaValida3')->nullable();
            $table->boolean('Aprobacion')->nullable();
            $table->boolean('Cancelacion')->nullable();
            $table->string('Observaciones', 500)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('IdPeriodo');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('IdPeriodo')->references('IdPeriodo')->on('periodos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_pases_de_salida');
    }
};
