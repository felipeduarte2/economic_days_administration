<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Esta migración crea la tabla 'puesto' en la base de datos.
// CREATE TABLE Puestos(
//     IdPuesto INT AUTO_INCREMENT PRIMARY KEY, 
//     Descripcion VARCHAR (40),  
//     -- descripcion TEXT, 
//     Validacion1 BOOLEAN,
//     Validacion2  BOOLEAN,
//     Validacion3  BOOLEAN
// );

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('puestos', function (Blueprint $table) {
            // La columna 'id' es una clave primaria que se autoincrementa.
            $table->id('IdPuesto');

            // La columna 'descripcion' puede almacenar valores de cadena hasta 40 caracteres.
            $table->string('Descripcion', 40);

            //las comumnas 'validacio1', 'validacion2' y 'validacion3' almacenan booleanos, por lo tanto pueden tener los val
            $table->boolean('Validacion1');
            $table->boolean('Validacion2');
            $table->boolean('Validacion3');

            // Las columnas 'created_at' y 'updated_at' almacenan los timestamps de cuando se creó o actualizó el registro.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Si la tabla 'puesto' existe, será eliminada.
        Schema::dropIfExists('puesto');
    }
};