<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Direccion>
 */
class DireccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'calle' => $this->faker->unique()->streetAddress(),
            'colonia' => ucfirst($this->faker->word()),
            // 'codigo_postal' => $this->faker->postcode(),
            'codigo_postal' => $this->faker->unique()->numberBetween(10000, 99999),
            'ciudad' => $this->faker->city(),
            'estado' => $this->faker->state(),
            'cobertura' => $this->faker->randomElement(['domicilio', 'ocurre']),
            'referencias' => $this->faker->optional()->sentence(),
            'prellenados' => [
                'nombre_cliente' => $this->faker->optional()->name(),
                'telefono_cliente' => $this->faker->optional()->phoneNumber(),
            ],
            'creado_por_usuario' => $this->faker->randomElement([1, 2]),
            'actualizado_por_usuario' => $this->faker->randomElement([1, 2]),
        ];
    }
}
