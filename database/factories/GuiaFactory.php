<?php

namespace Database\Factories;

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
        $numero_rastreo_mex = $this->faker->optional()->numberBetween(1000, 9999);
        $registro_salida = $numero_rastreo_mex ? $this->faker->optional()->numberBetween(1000, 9999) : null;
        $fecha_salida = $registro_salida ? $this->faker->dateTime() : null;

        return [
            'numero_rastreo_origen' => $this->faker->optional()->numberBetween(1000, 9999),
            'numero_rastreo_usa' => $this->faker->numberBetween(1000, 9999),
            'numero_rastreo_mex' => $numero_rastreo_mex,
            'registro_salida' => $registro_salida,
            'fecha_salida' => $fecha_salida,
            'observaciones' => $this->faker->optional()->sentence(),
            // 'status' => $this->faker->randomElement(GuiaStatusEnum::cases()),
            // 'direccion_id' => $this->faker->randomElement(factory(App\Models\Direccion::class)->count()),
            // 'transportadora_id' => $this->faker->randomElement(factory(App\Models\Transportadora::class)->count()),
            // 'salida_por_usuario' => $this->faker->randomElement([1, 2]),
        ];
    }
}
