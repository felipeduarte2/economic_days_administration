<?php

namespace Database\Factories;

use App\Models\Periodo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Solicitud>
 */
class SolicitudFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Motivo' => fake()->sentence(),
            'tipo_solicitud' => fake()->randomElement(['dias_economicos', 'pases_de_salida']),
            'FechaSolicitud' => now(),
            'FechaSolicitada' => fake()->dateTimeBetween('now', '6 months'), 
            'HoraSolicitada' => fake()->time(),
            'Validacion1' => true,
            'Validacion2' => true,
            'Validacion3' => true,
            'FechaValida1' => null,
            'FechaValida2' => null,
            'FechaValida3' => null,
            'Aprobacion' => true,
            'Cancelacion' => false,
            'Observaciones' => fake()->paragraph(),
            'user_id' => User::all()->random()->id,
            'IdPeriodo' => Periodo::all()->random()->IdPeriodo,
        ];
    }
}
