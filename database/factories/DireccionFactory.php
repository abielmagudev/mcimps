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
            'calle' => $this->faker->streetAddress(),
            'colonia' => $this->faker->streetAddress(),
            'codigo_postal' => $this->faker->postcode(),
            'ciudad' => $this->faker->city(),
            'estado' => $this->faker->state(),
            'nombre_contacto' => $this->faker->optional()->name(),
            'telefono_contacto' => $this->faker->optional()->phoneNumber(),
            'cobertura' => $this->faker->randomElement(['domicilio', 'ocurre']),
            'referencias' => $this->faker->optional()->sentence(),
        ];
    }
}
