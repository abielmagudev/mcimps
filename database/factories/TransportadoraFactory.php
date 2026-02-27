<?php

namespace Database\Factories;

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
            'sitio_web' => $this->faker->domainName(),
            'telefono' => $this->faker->phoneNumber(),
        ];
    }
}
