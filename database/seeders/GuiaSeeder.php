<?php

namespace Database\Seeders;

use App\Models\Direccion;
use App\Models\Guia;
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

        foreach ($guias as $guia) {
            $guia->direccion_id = $direcciones->random()->id;
            $guia->transportadora_id = $transportadoras->random()->id;
            $guia->salida_por_usuario = $guia->fecha_salida ? mt_rand(1,10) : null;
            $guia->creado_por_usuario = mt_rand(1,10);
            $guia->actualizado_por_usuario = mt_rand(1,10);
            $guia->save();
        }
    }
}
