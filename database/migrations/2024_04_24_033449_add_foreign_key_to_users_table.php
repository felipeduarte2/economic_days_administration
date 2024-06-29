<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * Se agregan las columnas "IdDepartamento" y "IdPuesto" de tipo entero a la tabla "users".
     * Además se crean las foreign keys para las columnas "IdDepartamento" y "IdPuesto"
     * que hacen referencia a las tablas "departamentos" y "puestos" respectivamente.
     * Si se elimina un registro relacionado, se establece el valor en NULL.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Agregar columnas
            $table->unsignedBigInteger('IdDepartamento')->nullable();
            $table->unsignedBigInteger('IdPuesto')->nullable();
            
            // Crear foreign keys
            $table->foreign('IdDepartamento')->references('IdDepartamento')->on('departamentos')->onDelete('set null');
            $table->foreign('IdPuesto')->references('IdPuesto')->on('puestos')->onDelete('set null');
        });
    }





    /**
     * Revierte las migraciones.
     *
     * Se eliminan las foreign keys de las columnas "IdDepartamento" y "IdPuesto",
     * y luego se eliminan las columnas "IdDepartamento" y "IdPuesto" de la tabla "users".
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminar foreign keys
            $table->dropForeign(['IdDepartamento']);  // Elimina la foreign key de la columna "IdDepartamento"
            $table->dropForeign(['IdPuesto']);         // Elimina la foreign key de la columna "IdPuesto"

            // Eliminar columnas
            $table->dropColumn(['IdDepartamento', 'IdPuesto']);  // Elimina las columnas "IdDepartamento" y "IdPuesto"
        });
    }
};
