<?php

namespace Database\Seeders;

use App\Models\Solicitud;
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

        Solicitud::factory(50)->Create();

        // SolicitudD::factory(10)->Create();

        // SolicitudP::factory(10)->Create();

        DB::table('users')->insert([
            'Nombre' => 'Admin',
            'ApellidoP' => 'Admin',
            'ApellidoM' => 'Admin',
            'Codigo_empleado' => '000000',
            'email' => 'test@example.com',
            'password' => bcrypt('000000'),
            'status' => 'Activo',
            'IdDepartamento' => 1,
            'IdPuesto' => 1,
        ]);
    }
}
