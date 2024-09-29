<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * Crear la tabla 'users' y 'password_reset_tokens' con sus respectivas columnas.
     * La tabla 'sessions' se crea con sus columnas.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            // Crear la columna 'id' con autoincremento
            $table->id();
            
            // Crear la columna 'email' única
            $table->string('email')->unique();
            
            // Crear la columna 'email_verified_at' para almacenar el tiempo de verificación del correo electrónico
            $table->timestamp('email_verified_at')->nullable();
            
            // Crear la columna 'password' para almacenar la contraseña
            $table->string('password');
            
            // Crear la columna 'Codigo_empleado' con una longitud máxima de 10
            $table->string('Codigo_empleado', 10);
            
            // Crear la columna 'Nombre' con una longitud máxima de 30
            $table->string('Nombre', 30);
            
            // Crear la columna 'ApellidoP' con una longitud máxima de 20
            $table->string('ApellidoP', 20);
            
            // Crear la columna 'ApellidoM' con una longitud máxima de 20
            $table->string('ApellidoM', 20);
            
            // Crear la columna 'status' con un enum que puede tener los valores 'Activo' o 'Inactivo'
            $table->enum('status', ['Activo', 'Inactivo']);
            
            // Crear la columna 'remember_token' para almacenar el token de recordación
            $table->rememberToken();
            
            // Crear las columnas 'created_at' y 'updated_at' para almacenar los timestamps de creación y actualización
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            // Crear la columna 'email' como la clave primaria
            $table->string('email')->primary();
            
            // Crear la columna 'token' para almacenar el token de restablecimiento de contraseña
            $table->string('token');
            
            // Crear la columna 'created_at' para almacenar el tiempo de creación
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            // Crear la columna 'id' como la clave primaria
            $table->string('id')->primary();
            
            // Crear la columna 'user_id' como una clave foránea que puede ser nula
            $table->foreignId('user_id')->nullable()->index();
            
            // Crear la columna 'ip_address' con una longitud máxima de 45 que puede ser nula
            $table->string('ip_address', 45)->nullable();
            
            // Crear la columna 'user_agent' para almacenar el agente de usuario
            $table->text('user_agent')->nullable();
            
            // Crear la columna 'payload' para almacenar el payload
            $table->longText('payload');
            
            // Crear la columna 'last_activity' para almacenar la última actividad
            $table->integer('last_activity')->index();
        });
    }





    /**
     * Deshacer las migraciones.
     *
     * Elimina las tablas 'users', 'password_reset_tokens' y 'sessions' de la base de datos.
     */
    public function down(): void
    {
        // Elimina la tabla 'users' si existe
        Schema::dropIfExists('users');

        // Elimina la tabla 'password_reset_tokens' si existe
        Schema::dropIfExists('password_reset_tokens');

        // Elimina la tabla 'sessions' si existe
        Schema::dropIfExists('sessions');
    }
};
