<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


// Esta migración crea la tabla 'periodo' en la base de datos.
// La tabla 'periodos' tiene 4 columnas:
//   - 'id' (incrementa, clave primaria, único)
//   - 'descripcion' (cadena, máximo 20 caracteres)
//   - 'fecha_inicio' (fecha-hora)
//   - 'fecha_fin' (fecha-hora).
//   - 'created_at' (timestamo)
//   - 'updated_at' (timestamo)

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('periodos', function (Blueprint $table) {
            // La columna 'id' es una clave primaria que se autoincrementa.
            $table->id('IdPeriodo');

            // La columna 'descripcion' puede almacenar valores de cadena hasta 20 caracteres.
            $table->string('descripcion', 20); // Restringimos la longitud a 20 caracteres
            
            // La columna 'fecha_inicio' y 'fecha_fin' puede almacenar valores de fecha y hora.
            // El valor 'por defecto' está establecido en la fecha y hora actual en el momento de crear el registro.
            $table->dateTime('fecha_inicio')->nullable()->default(now());;
            $table->dateTime('fecha_fin')->nullable()->default(now());;

            // Las columnas 'created_at' y 'updated_at' almacenan los timestamps de cuando se creó o actualizó el registro.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Si la tabla 'periodo' existe, será eliminada.
        Schema::dropIfExists('periodos');
    }
};