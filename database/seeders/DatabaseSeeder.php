<?php

namespace Database\Seeders;

use App\Models\Departamento;
use App\Models\Periodo;
use App\Models\Puesto;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $Periodo = new Periodo();
        $Periodo->descripcion = 'Primer Periodo';
        $Periodo->fecha_inicio = '2022-01-01';
        $Periodo->fecha_fin = '2022-06-30';
        $Periodo->save();

        $Departamento = new Departamento();
        $Departamento->descripcion = 'Sistemas';
        $Departamento->save();

        // $Periodo->descripcion = 'Segundo Periodo';
        // $Periodo->fecha_inicio = '2022-07-01';
        // $Periodo->fecha_fin = '2022-12-31';
        // $Periodo->save();

        $Puesto = new Puesto();
        $Puesto->descripcion = 'Administrador';
        $Puesto->Validacion1= false;
        $Puesto->Validacion2= false;
        $Puesto->Validacion3= false;
        $Puesto->save();
    }
}
