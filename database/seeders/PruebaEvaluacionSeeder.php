<?php

namespace Database\Seeders;

use App\Models\Asignacion;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Periodo;
use App\Models\Pregunta;
use App\Models\RespuestaEvaluacion;
use Illuminate\Database\Seeder;

class PruebaEvaluacionSeeder extends Seeder
{
    public function run(): void
    {
        $periodoActivo = Periodo::where('activo', true)->firstOrFail();

        // 1. Docentes de prueba
        $docente1 = Docente::firstOrCreate(
            ['numero_empleado' => 'EMP-101'],
            ['nombre_completo' => 'Mtro. Carlos Mendoza Ríos']
        );

        $docente2 = Docente::firstOrCreate(
            ['numero_empleado' => 'EMP-102'],
            ['nombre_completo' => 'Lic. Laura Elena Torres Cruz']
        );

        // 2. Asignaciones (Materias por grupo)
        $asig1 = Asignacion::firstOrCreate([
            'periodo_id' => $periodoActivo->id,
            'docente_id' => $docente1->id,
            'materia'    => 'Matemáticas III',
            'grupo'      => '301-A',
        ]);

        $asig2 = Asignacion::firstOrCreate([
            'periodo_id' => $periodoActivo->id,
            'docente_id' => $docente2->id,
            'materia'    => 'Taller de Lectura y Redacción III',
            'grupo'      => '301-A',
        ]);

        // 3. Estudiantes de prueba (incluye usuario de acceso administrativo)
        $est1 = Estudiante::firstOrCreate(
            ['matricula' => '20260001'],
            [
                'curp'            => 'TEST000101HDFRRL01',
                'nombre_completo' => 'Juan Pérez García',
                'grupo'           => '301-A',
                'turno'           => 'Matutino',
            ]
        );

        $est2 = Estudiante::firstOrCreate(
            ['matricula' => '20260002'],
            [
                'curp'            => 'TEST000202MDFRRL02',
                'nombre_completo' => 'María Fernanda López Díaz',
                'grupo'           => '301-A',
                'turno'           => 'Matutino',
            ]
        );

        // 4. Vincular carga académica en tabla pivote estudiante_asignacion
        $est1->asignaciones()->syncWithoutDetaching([
            $asig1->id => ['completado' => true, 'fecha_evaluacion' => now()],
            $asig2->id => ['completado' => false, 'fecha_evaluacion' => null],
        ]);

        $est2->asignaciones()->syncWithoutDetaching([
            $asig1->id => ['completado' => false, 'fecha_evaluacion' => null],
            $asig2->id => ['completado' => false, 'fecha_evaluacion' => null],
        ]);

        // 5. Respuestas anónimas de ejemplo para asig1 (sin referencia al estudiante)
        if (RespuestaEvaluacion::where('asignacion_id', $asig1->id)->count() === 0) {
            $preguntas = Pregunta::where('activa', true)->get();
            foreach ($preguntas as $pregunta) {
                RespuestaEvaluacion::create([
                    'asignacion_id' => $asig1->id,
                    'pregunta_id'   => $pregunta->id,
                    'puntuacion'    => $pregunta->tipo === 'escala' ? 5 : null,
                    'comentario'    => $pregunta->tipo === 'texto' ? 'Excelente dominio de la clase y ejemplos muy claros.' : null,
                ]);
            }
        }
    }
}