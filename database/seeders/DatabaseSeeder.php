<?php

namespace Database\Seeders;

use App\Models\Guia;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create([
            'creado_por_usuario' => 1,
            'actualizado_por_usuario' => 1,
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        auth()->login(User::first());

        $this->call([
            ClienteSeeder::class,
            DireccionSeeder::class,
            TransportadoraSeeder::class,
            GuiaSeeder::class,
        ]);

        auth()->logout();
    }
}
