<?php

namespace Database\Seeders;

use App\Models\SolicitudD;
use App\Models\SolicitudP;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Sembra la base de datos de la aplicación.
     */
    public function run(): void
    {

        $this->call(DepartamentosSeeder::class);
        $this->call(PuestossSeeder::class);
        $this->call(PeriodosSeeder::class);


        User::factory(15)->Create();

        SolicitudD::factory(10)->Create();

        SolicitudP::factory(10)->Create();

        DB::table('users')->insert([
            'Nombre' => 'Felipe',
            'ApellidoP' => 'Duarte',
            'ApellidoM' => 'Castillo',
            'Codigo_empleado' => '000000',
            'email' => 'test@example.com',
            'password' => bcrypt('12345678'),
            'status' => 'Activo',
            'IdDepartamento' => 1,
            'IdPuesto' => 1,
        ]);
    }
}
