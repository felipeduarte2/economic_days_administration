<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * Crea las tablas 'cache' y 'cache_locks' con sus respectivas columnas.
     */
    public function up(): void
    {
        // Crear la tabla 'cache'
        Schema::create('cache', function (Blueprint $table) {
            // Crear la columna 'key' como la clave primaria
            $table->string('key')->primary();
            // Crear la columna 'value' para almacenar el valor
            $table->mediumText('value');
            // Crear la columna 'expiration' para almacenar la fecha de expiración
            $table->integer('expiration');
        });

        // Crear la tabla 'cache_locks'
        Schema::create('cache_locks', function (Blueprint $table) {
            // Crear la columna 'key' como la clave primaria
            $table->string('key')->primary();
            // Crear la columna 'owner' para almacenar el propietario
            $table->string('owner');
            // Crear la columna 'expiration' para almacenar la fecha de expiración
            $table->integer('expiration');
        });
    }




    /**
     * Reverse the migrations.
     *
     * Elimina las tablas 'cache' y 'cache_locks' si existen.
     */
    public function down(): void
    {
        // Elimina la tabla 'cache' si existe
        Schema::dropIfExists('cache');
        // Elimina la tabla 'cache_locks' si existe
        Schema::dropIfExists('cache_locks');
    }
};
