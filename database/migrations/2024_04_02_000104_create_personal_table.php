<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Esta migración crea la tabla 'personal' en la base de datos.

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->id('IdPersonal');
            $table->string('Codigo_empleado');
            $table->string('Nombre', 30);
            $table->string('ApellidoP', 20);
            $table->string('ApellidoM', 20);
            $table->string('Contrasena', 20);
            $table->unsignedBigInteger('IdDepartamento');
            $table->unsignedBigInteger('IDPuesto');
            $table->foreign('IdDepartamento')->references('IdDepartamento')->on('departamentos');
            $table->foreign('IDPuesto')->references('IdPuesto')->on('puestos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Si la tabla 'solicitud' existe, será eliminada.
        Schema::dropIfExists('personal');
    }
};
