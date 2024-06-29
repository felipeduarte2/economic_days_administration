<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * Crea la tabla 'departamentos' con las columnas 'IdDepartamento', 'Descripcion' y 'timestamps'.
     * La columna 'IdDepartamento' es una clave primaria que se autoincrementa.
     * La columna 'Descripcion' puede almacenar valores de cadena hasta 40 caracteres.
     * Las columnas 'created_at' y 'updated_at' almacenan los timestamps de cuando se creó o actualizó el registro.
     */
    public function up(): void
    {
        Schema::create('departamentos', function (Blueprint $table) {
            // La columna 'IdDepartamento' es una clave primaria que se autoincrementa.
            $table->id('IdDepartamento');

            // La columna 'Descripcion' puede almacenar valores de cadena hasta 40 caracteres.
            $table->string('Descripcion', 40);

            // Las columnas 'created_at' y 'updated_at' almacenan los timestamps de cuando se creó o actualizó el registro.
            $table->timestamps();
        });
    }




    /**
     * Deshacer las migraciones.
     *
     * Elimina la tabla 'departamentos' si existe.
     */
    public function down(): void
    {
        // Si la tabla 'departamentos' existe, será eliminada.
        Schema::dropIfExists('departamentos');
    }
};