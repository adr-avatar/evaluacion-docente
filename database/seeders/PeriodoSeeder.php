<?php

namespace Database\Seeders;

use App\Models\Periodo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Periodo::firstOrCreate(
            ['nombre' => '2026-A'],
            ['activo' => false]
        );

        Periodo::firstOrCreate(
            ['nombre' => '2026-B'],
            ['activo' => true]
        );
    }
}
