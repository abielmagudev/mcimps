<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\User\UserTypeEnum;
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
        User::factory()->create([
            'name' => 'superadmin',
            'email' => 'superadmin@mail.com',
            'password' => bcrypt('password'),
            'type' => UserTypeEnum::ADMINISTRADOR,
            'creado_por_usuario' => 1,
            'actualizado_por_usuario' => 1,
        ]);

        if( env('APP_ENV') === 'production' ) {
            return;
        }

        User::factory(10)->create([
            'creado_por_usuario' => 1,
            'actualizado_por_usuario' => 1,
        ]);

        $this->call([
            SocioSeeder::class,
            DireccionSeeder::class,
            TransportadoraSeeder::class,
            GuiaSeeder::class,
        ]);
    }
}
