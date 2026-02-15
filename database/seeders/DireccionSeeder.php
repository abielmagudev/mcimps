<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DireccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes = \App\Models\Cliente::all();

        \App\Models\Direccion::factory(10)->create([
            'cliente_id' => fn () =>$clientes->random()->id,
        ]);
    }
}
