<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PuestossSeeder extends Seeder
{
    /**
     * Ejecute las semillas de la base de datos.
     */
    public function run(): void
    {

        DB::table('puestos')->insert([
            'Descripcion' => 'Administrador',
        ]);
        // DB::table('puestos')->insert([
        //     'Descripcion' => 'Director',
        // ]);
        DB::table('puestos')->insert([
            'Descripcion' => 'SubDirector',
        ]);
        DB::table('puestos')->insert([
            'Descripcion' => 'Cordinador',
        ]);
        DB::table('puestos')->insert([
            'Descripcion' => 'Docente',
        ]);    }
}
