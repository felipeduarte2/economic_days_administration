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
            $table->unsignedBigInteger('IdPuesto')->nullable();
            $table->foreign('IdDepartamento')->references('IdDepartamento')->on('departamentos')->onDelete('set null');
            $table->foreign('IdPuesto')->references('IdPuesto')->on('puestos')->onDelete('set null');
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
            $table->dropForeign(['IdDepartamento']);
            $table->dropForeign(['IdPuesto']);
            $table->dropColumn(['IdDepartamento', 'IDPuesto']);
            
        });
    }
};
