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

        DB::table('departamentos')->insert([
            'Descripcion' => 'SUBDIRECTOR',
        ]);

        DB::table('departamentos')->insert([
            'Descripcion' => 'ADMINISTRADOR',
        ]);

        DB::table('users')->insert([
            'Nombre' => 'Admin',
            'ApellidoP' => 'Admin',
            'ApellidoM' => 'Admin',
            'Codigo_empleado' => '000000',
            'email' => 'test@example.com',
            // 'email_verified_at' => now(),
            'password' => bcrypt('000000'),
            'status' => 'Activo',
            'IdDepartamento' => 8,
            'IdPuesto' => 1,
        ]);

        // DB::table('users')->insert([
        //     'Nombre' => 'Cordi',
        //     'ApellidoP' => 'Cordi',
        //     'ApellidoM' => 'Cordi',
        //     'Codigo_empleado' => '444444',
        //     'email' => 'test@example2.com',
        //     // 'email_verified_at' => now(),
        //     'password' => bcrypt('444444'),
        //     'status' => 'Activo',
        //     'IdDepartamento' => 5,
        //     'IdPuesto' => 3,
        // ]);

        // DB::table('users')->insert([
        //     'Nombre' => 'Sub',
        //     'ApellidoP' => 'Direct',
        //     'ApellidoM' => 'Direct',
        //     'Codigo_empleado' => '888888',
        //     'email' => 'test@example3.com',
        //     // 'email_verified_at' => now(),
        //     'password' => bcrypt('888888'),
        //     'status' => 'Activo',
        //     'IdDepartamento' => 7,
        //     'IdPuesto' => 2,
        // ]);

    }
}
