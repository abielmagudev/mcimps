<?php

namespace Database\Factories;

use App\Models\Transportadora\TransportadoraNacionalidadEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportadora>
 */
class TransportadoraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'nombre' => $this->faker->unique()->company(),
            'nombre' => $this->faker->unique()->randomElement(['DHL', 'FedEx', 'UPS', 'Correos']),
            'sitio_web' => 'https://' . $this->faker->domainName(),
            'telefono' => $this->faker->phoneNumber(),
            'nacionalidad' => $this->faker->randomElement(TransportadoraNacionalidadEnum::cases()),
            'creado_por_usuario' => $this->faker->randomElement([1, 2]),
            'actualizado_por_usuario' => $this->faker->randomElement([1, 2]),
        ];
    }
}
