<?php

namespace Database\Factories;

use App\Models\Periodo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SolicitudP>
 */
class SolicitudPFactory extends Factory
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
            'FechaSolicitud' => fake()->date(),
            'FechaSolicitada' => fake()->date(),
            'HoraSolicitada' => fake()->time(),
            'Validacion1' => null,
            'Validacion2' => null,
            'Validacion3' => null,
            'FechaValida1' => null,
            'FechaValida2' => null,
            'FechaValida3' => null,
            'Aprobacion' => null,
            'Cancelacion' => null,
            'Observaciones' => fake()->paragraph(),
            'user_id' => User::all()->random()->id,
            'IdPeriodo' => Periodo::all()->random()->IdPeriodo,
        ];
    }
}
