<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodosSeeder extends Seeder
{
    /**
     * Ejecute las semillas de la base de datos.
     */
    public function run(): void
    {
        DB::table('periodos')->insert([
            'descripcion' => '2024A',
            'fecha_inicio' => '2024-01-01',
            'fecha_fin' => '2024-06-30',
        ]);

        DB::table('periodos')->insert([
            'descripcion' => '2024B',
            'fecha_inicio' => '2024-07-01',
            'fecha_fin' => '2024-12-31',
        ]);

        DB::table('periodos')->insert([
            'descripcion' => '2025A',
            'fecha_inicio' => '2025-01-01',
            'fecha_fin' => '2025-06-30',
        ]);

        DB::table('periodos')->insert([
            'descripcion' => '2025B',
            'fecha_inicio' => '2025-07-01',
            'fecha_fin' => '2025-12-31',
        ]);

    }
}
