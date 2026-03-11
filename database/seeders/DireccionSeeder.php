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
        $socios = \App\Models\Socio::all();

        \App\Models\Direccion::factory(30)->create([
            'socio_id' => fn () => $socios->random()->id,
        ]);
    }
}
