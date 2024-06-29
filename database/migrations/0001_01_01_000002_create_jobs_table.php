<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * Crea las tablas 'jobs', 'job_batches' y 'failed_jobs' con sus respectivas columnas.
     */
    public function up(): void
    {
        // Crear la tabla 'jobs'
        Schema::create('jobs', function (Blueprint $table) {
            // Crear la columna 'id' como la clave primaria
            $table->id();

            // Crear la columna 'queue' para almacenar la cola del trabajo
            $table->string('queue')->index();

            // Crear la columna 'payload' para almacenar la carga útil del trabajo
            $table->longText('payload');

            // Crear la columna 'attempts' para almacenar el número de intentos de ejecución del trabajo
            $table->unsignedTinyInteger('attempts');

            // Crear las columnas 'reserved_at' y 'available_at' para almacenar la fecha de reserva y disponibilidad del trabajo
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');

            // Crear la columna 'created_at' para almacenar la fecha de creación del trabajo
            $table->unsignedInteger('created_at');
        });

        // Crear la tabla 'job_batches'
        Schema::create('job_batches', function (Blueprint $table) {
            // Crear la columna 'id' como la clave primaria
            $table->string('id')->primary();

            // Crear la columna 'name' para almacenar el nombre del lote de trabajo
            $table->string('name');

            // Crear las columnas 'total_jobs', 'pending_jobs' y 'failed_jobs' para almacenar el número total de trabajos,
            // los trabajos pendientes y los trabajos fallidos respectivamente
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');

            // Crear la columna 'failed_job_ids' para almacenar los IDs de los trabajos fallidos
            $table->longText('failed_job_ids');

            // Crear la columna 'options' para almacenar opciones adicionales
            $table->mediumText('options')->nullable();

            // Crear las columnas 'cancelled_at' y 'created_at' para almacenar la fecha de cancelación y la fecha de creación
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');

            // Crear la columna 'finished_at' para almacenar la fecha de finalización
            $table->integer('finished_at')->nullable();
        });

        // Crear la tabla 'failed_jobs'
        Schema::create('failed_jobs', function (Blueprint $table) {
            // Crear la columna 'id' como la clave primaria
            $table->id();

            // Crear la columna 'uuid' para almacenar el UUID único del trabajo fallido
            $table->string('uuid')->unique();

            // Crear las columnas 'connection', 'queue' y 'payload' para almacenar la conexión, la cola y la carga útil del trabajo
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');

            // Crear la columna 'exception' para almacenar la excepción generada por el trabajo fallido
            $table->longText('exception');

            // Crear la columna 'failed_at' para almacenar la fecha y hora en que se produjo el fallo del trabajo
            $table->timestamp('failed_at')->useCurrent();
        });
    }




    /**
     * Reverse the migrations.
     *
     * Elimina las tablas 'jobs', 'job_batches' y 'failed_jobs' si existen.
     */
    public function down(): void
    {
        // Elimina la tabla 'jobs' si existe
        Schema::dropIfExists('jobs');
        
        // Elimina la tabla 'job_batches' si existe
        Schema::dropIfExists('job_batches');
        
        // Elimina la tabla 'failed_jobs' si existe
        Schema::dropIfExists('failed_jobs');
    }
};
