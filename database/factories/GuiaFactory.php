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

        $posicion_caja = mt_rand(1,4);
        $numero_cajas = mt_rand(1,4);

        if( $posicion_caja > $numero_cajas ) {
            $posicion_caja = $numero_cajas;
        }

        return [
            'numero_rastreo_secundario' => $this->faker->optional()->numberBetween(10000000, 99999999),
            'numero_rastreo_usa' => $this->faker->bothify('**********************'),
            'numero_consolidado' => $this->faker->optional()->numberBetween(10000000, 99999999),
            'secuencia_cajas' => mt_rand(0,1) ? sprintf('%s de %s', $posicion_caja, $numero_cajas) : null,
            'observaciones' => $this->faker->optional()->sentence(),
            'nombre_cliente' => $this->faker->optional()->name(),
            'telefono_cliente' => $this->faker->optional()->phoneNumber(),
            'status' => $this->faker->randomElement( array_column(GuiaStatusEnum::cases(), 'value') ),
        ];
    }
}
