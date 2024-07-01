<?php

namespace Database\Factories;

use App\Models\Departamento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * La contraseña actual que utiliza la fábrica.
     */
    protected static ?string $password;

    /**
     *Defina el estado predeterminado del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            // 'password' => static::$password ??= Hash::make('password'),
            'password' => Hash::make('000000'),
            'remember_token' => Str::random(10),
            'Codigo_empleado' => fake()->unique()->randomNumber(6, true),
            'Nombre' => fake()->firstName(),
            'ApellidoP' => fake()->lastName(),
            'ApellidoM' => fake()->lastName(),
            'status' => 'Activo',
            'IdDepartamento' => Departamento::all()->random()->IdDepartamento,
            'IdPuesto' => 4, 
        ];
    }

    /**
     * Indique que la dirección de correo electrónico del modelo no debe estar verificada.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
