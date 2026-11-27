<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'direccion@epo364.edu.mx'],
            [
                'name'     => 'Dirección Escolar EPO 364',
                'password' => Hash::make('AdminEPO364*'),
            ]
        );

        $this->call([
            PeriodoSeeder::class,
            PreguntaSeeder::class,
            PruebaEvaluacionSeeder::class,
        ]);
    }
}