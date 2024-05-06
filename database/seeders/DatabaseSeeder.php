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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $Periodo = new Periodo();
        $Periodo->descripcion = 'Primer Periodo';
        $Periodo->fecha_inicio = '2022-01-01';
        $Periodo->fecha_fin = '2022-06-30';
        $Periodo->save();

        $Departamento = new Departamento();
        $Departamento->descripcion = 'Ingeniria en Sistemas';; 
        $Departamento->save();

        $Departamento2 = new Departamento();
        $Departamento2->descripcion = 'Ingeniria en Getion';
        $Departamento2->save();

        $Departamento3 = new Departamento();
        $Departamento3->descripcion = 'Ingeniria en Bioqimica';
        $Departamento3->save();

        $Departamento4 = new Departamento();
        $Departamento4->descripcion = 'Ingeniria Civil';
        $Departamento4->save();

        // $Departamento5 = new Departamento();
        // $Departamento5->descripcion = 'Ingeniria ';
        // $Departamento5->save();



        // $Periodo->descripcion = 'Segundo Periodo';
        // $Periodo->fecha_inicio = '2022-07-01';
        // $Periodo->fecha_fin = '2022-12-31';
        // $Periodo->save();

        $Puesto = new Puesto();
        $Puesto->descripcion = 'Administrador';
        // $Puesto->Validacion1= false;
        // $Puesto->Validacion2= false;
        // $Puesto->Validacion3= false;
        $Puesto->save();

        $Puesto2 = new Puesto();
        $Puesto2->descripcion = 'Docente';
        $Puesto2->save();

        // $Puesto3 = new Puesto();
        // $Puesto3->descripcion = 'Jefe';
        // $Puesto3->save();

        $Usuario = new User();
        $Usuario->Nombre = 'Felipe';
        $Usuario->ApellidoP = 'Duarte';
        $Usuario->ApellidoM = 'Castillo';
        $Usuario->Codigo_empleado = '000000';
        $Usuario->password = bcrypt('12345678');
        $Usuario->email = "test@example.com";
        $Usuario->IdDepartamento = 1;
        $Usuario->IdPuesto = 1;
        $Usuario->save();
    }
}
