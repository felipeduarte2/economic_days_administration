<?php

namespace Database\Seeders;

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

        DB::table('users')->insert([
            'Nombre' => 'Felipe',
            'ApellidoP' => 'Duarte',
            'ApellidoM' => 'Castillo',
            'Codigo_empleado' => '000000',
            'email' => 'test@example.com',
            'password' => bcrypt('12345678'),
            'IdDepartamento' => 1,
            'IdPuesto' => 1,
        ]);

        // $Usuario = new User();
        // $Usuario->Nombre = 'Felipe';
        // $Usuario->ApellidoP = 'Duarte';
        // $Usuario->ApellidoM = 'Castillo';
        // $Usuario->Codigo_empleado = '000000';
        // $Usuario->password = bcrypt('12345678');
        // $Usuario->email = "test@example.com";
        // $Usuario->IdDepartamento = 1;
        // $Usuario->IdPuesto = 1;
        // $Usuario->save();
    }
}
