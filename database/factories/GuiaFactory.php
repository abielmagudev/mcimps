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
        return [
            'numero_rastreo_origen' => $this->faker->optional()->numberBetween(1000, 9999),
            'numero_rastreo_usa' => $this->faker->numberBetween(1000, 9999),
            'numero_rastreo_mex' => $this->faker->optional()->numberBetween(1000, 9999),
            'numero_rastreo_salida' => $this->faker->optional()->numberBetween(1000, 9999),
            'observaciones' => $this->faker->optional()->sentence(),
            'status' => $this->faker->randomElement(GuiaStatusEnum::cases()),
            // 'direccion_id' => $this->faker->randomElement(factory(App\Models\Direccion::class)->count()),
            // 'transportadora_id' => $this->faker->randomElement(factory(App\Models\Transportadora::class)->count()),
            // 'salida_por_usuario' => $this->faker->randomElement([1, 2]),
        ];
    }
}
