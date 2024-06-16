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
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(DepartamentosSeeder::class);
        $this->call(PuestossSeeder::class);
        $this->call(PeriodosSeeder::class);


        User::factory(35)->Create();

        SolicitudD::factory(30)->Create();

        SolicitudP::factory(30)->Create();

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
