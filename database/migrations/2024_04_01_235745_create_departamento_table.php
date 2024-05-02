<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Esta migración crea la tabla 'departamento' en la base de datos.
// CREATE TABLE Departamentos(
//     IdDepartamento INT PRIMARY KEY AUTO_INCREMENT,
//     Descripcion  VARCHAR (40)
// );

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     */
    public function up(): void
    {
        Schema::create('departamentos', function (Blueprint $table) {
            // La columna 'id' es una clave primaria que se autoincrementa.
            $table->id('IdDepartamento');

            // La columna 'descripcion' puede almacenar valores de cadena hasta 40 caracteres.
            $table->string('Descripcion', 40);

            // Las columnas 'created_at' y 'updated_at' almacenan los timestamps de cuando se creó o actualizó el registro.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Si la tabla 'departamento' existe, será eliminada.
        Schema::dropIfExists('departamentos');
    }
};