<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Socio>
 */
class SocioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->unique()->name(),
            'telefono' => $this->faker->phoneNumber(),
            'creado_por_usuario' => $this->faker->randomElement([1, 2]),
            'actualizado_por_usuario' => $this->faker->randomElement([1, 2]),
        ];
    }
}
