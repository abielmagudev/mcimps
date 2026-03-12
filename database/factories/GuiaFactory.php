<?php

namespace Database\Factories;

use App\Models\Guia\GuiaStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guia>
 */
class GuiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $numero_rastreo_mex = $this->faker->optional()->bothify('**********************');
        // $registro_salida = $numero_rastreo_mex ? $this->faker->optional()->bothify('**********************') : null;
        // $fecha_salida = $registro_salida ? $this->faker->dateTime() : null;
        // 'salida_por_usuario' => $this->faker->randomElement([1, 2]),

        return [
            'numero_rastreo_origen' => $this->faker->optional()->numberBetween(10000000, 99999999),
            'numero_rastreo_usa' => $this->faker->bothify('**********************'),
            'observaciones' => $this->faker->optional()->sentence(),
            'nombre_contacto' => $this->faker->optional()->name(),
            'telefono_contacto' => $this->faker->optional()->phoneNumber(),
            'status' => $this->faker->randomElement( array_column(GuiaStatusEnum::cases(), 'value') ),
        ];
    }
}
