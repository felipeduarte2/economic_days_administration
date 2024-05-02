<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('IdDepartamento')->nullable();
            $table->unsignedBigInteger('IDPuesto')->nullable();
            $table->foreign('IdDepartamento')->references('IdDepartamento')->on('departamentos')->onDelete('set null');
            $table->foreign('IDPuesto')->references('IdPuesto')->on('puestos')->onDelete('set null');
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            // $table->dropForeign(['IdDepartamento']);
            // $table->dropForeign(['IDPuesto']);
            // $table->dropColumn(['IdDepartamento', 'IDPuesto']);
            //
        });
    }
};
