<?php

namespace Database\Factories;

use App\Models\Periodo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SolicitudD>
 */
class SolicitudDFactory extends Factory
{
    /**
     * Defina el estado predeterminado del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Motivo' => fake()->sentence(),
            'FechaSolicitud' => now(),
            'FechaSolicitada' => fake()->dateTimeBetween('now', '6 months'), 
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
