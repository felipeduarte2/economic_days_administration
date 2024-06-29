<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * Crea la tabla 'periodos' con las columnas 'IdPeriodo', 'descripcion', 'fecha_inicio', 'fecha_fin', 
     * 'created_at' y 'updated_at'.
     * - La columna 'IdPeriodo' es una clave primaria que se autoincrementa.
     * - La columna 'descripcion' puede almacenar valores de cadena hasta 20 caracteres.
     * - La columna 'fecha_inicio' y 'fecha_fin' puede almacenar valores de fecha y hora.
     * - El valor 'por defecto' de 'fecha_inicio' y 'fecha_fin' está establecido en la fecha y hora actual en el
     *   momento de crear el registro.
     * - Las columnas 'created_at' y 'updated_at' almacenan los timestamps de cuando se creó o actualizó el registro.
     */
    public function up(): void
    {
        Schema::create('periodos', function (Blueprint $table) {
            // La columna 'IdPeriodo' es una clave primaria que se autoincrementa.
            $table->id('IdPeriodo');

            // La columna 'descripcion' puede almacenar valores de cadena hasta 20 caracteres.
            $table->string('descripcion', 20)->comment('Descripción del período');
            
            // La columna 'fecha_inicio' y 'fecha_fin' puede almacenar valores de fecha y hora.
            // El valor 'por defecto' de 'fecha_inicio' y 'fecha_fin' está establecido en la fecha y hora actual en el
            // momento de crear el registro.
            $table->dateTime('fecha_inicio')->nullable()->default(now());
            $table->dateTime('fecha_fin')->nullable()->default(now());

            // Las columnas 'created_at' y 'updated_at' almacenan los timestamps de cuando se creó o actualizó el registro.
            $table->timestamps();
        });
    }




    /**
     * Deshacer las migraciones.
     *
     * Elimina la tabla 'periodos' si existe.
     */
    public function down(): void
    {
        // Si la tabla 'periodos' existe, será eliminada.
        Schema::dropIfExists('periodos');
        // NOTA: Si la tabla 'periodos' no existe, no se realiza ninguna acción.
    }
};