<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento;
use Illuminate\Support\Facades\DB;

class DepartamentosSeeder extends Seeder
{
    /**
     * Ejecute las semillas de la base de datos.
     */
    public function run(): void
    {

        DB::table('departamentos')->insert([
            'Descripcion' => 'INGENIERÍA EN GESTIÓN EMPRESARIAL',
        ]);

        DB::table('departamentos')->insert([
            'Descripcion' => 'INGENIERÍA INDUSTRIAL',
        ]);

        DB::table('departamentos')->insert([
            'Descripcion' => 'INGENIERÍA EN DESARROLLO COMUNITARIO ',
        ]);

        DB::table('departamentos')->insert([
            'Descripcion' => 'INGENIERÍA BIOQUÍMICA',
        ]);

        DB::table('departamentos')->insert([
            'Descripcion' => 'INGENIERÍA EN SISTEMAS COMPUTACIONALES',
        ]);

        DB::table('departamentos')->insert([
            'Descripcion' => 'INGENIERÍA CIVIL',
        ]);

    }
}
