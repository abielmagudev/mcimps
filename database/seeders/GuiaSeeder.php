<?php

namespace Database\Seeders;

use App\Models\Direccion;
use App\Models\Guia;
use App\Models\Guia\GuiaStatusEnum;
use App\Models\Transportadora;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $direcciones = Direccion::all();
        $transportadoras = Transportadora::all();
        $guias = Guia::factory(100)->make();

        foreach ($guias as $guia)
        {
            if( $guia->numero_rastreo_mex )
            {
                $guia->direccion_id = $direcciones->random()->id;
                $guia->transportadora_id = $transportadoras->random()->id;
            }
            else
            {
                $guia->direccion_id = mt_rand(0,1) ? $direcciones->random()->id : null;
                $guia->transportadora_id = $guia->direccion_id && mt_rand(0,1) ? $transportadoras->random()->id : null;
            }

            if( $guia->transportadora_id &&! $guia->registro_salida )
            {
                $guia->status = GuiaStatusEnum::PENDIENTE;
            }

            if( $guia->registro_salida )
            {
                $guia->salida_por_usuario = mt_rand(1,10);
                $guia->status = mt_rand(0,1) ? GuiaStatusEnum::ENTREGADO : GuiaStatusEnum::TRANSITO;
            }

            $guia->creado_por_usuario = mt_rand(1,10);
            $guia->actualizado_por_usuario = mt_rand(1,10);
            $guia->save();
        }
    }
}
