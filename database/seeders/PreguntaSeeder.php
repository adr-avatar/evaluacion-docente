<?php

namespace Database\Seeders;

use App\Models\Pregunta;
use App\Models\Periodo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $preguntas = [
            // Sección: Evaluación al Docente (Escala 1-5)
            ['texto' => 'El docente expone los temas con claridad y dominio de la asignatura.', 'tipo' => 'escala', 'seccion' => 'docente', 'orden' => 1, 'activa' => true],
            ['texto' => 'Fomenta la participación activa y resuelve las dudas del grupo de manera respetuosa.', 'tipo' => 'escala', 'seccion' => 'docente', 'orden' => 2, 'activa' => true],
            ['texto' => 'Cumple puntualmente con el horario de clase y los criterios de evaluación establecidos.', 'tipo' => 'escala', 'seccion' => 'docente', 'orden' => 3, 'activa' => true],
            ['texto' => 'Utiliza recursos y ejemplos prácticos que facilitan el aprendizaje.', 'tipo' => 'escala', 'seccion' => 'docente', 'orden' => 4, 'activa' => true],
            // Sección: Evaluación al Docente (Abierta)
            ['texto' => 'Comentarios o sugerencias constructivas sobre el desempeño del docente:', 'tipo' => 'texto', 'seccion' => 'docente', 'orden' => 5, 'activa' => true],
            // Sección: Autoevaluación del Estudiante
            ['texto' => 'Asistí puntualmente a clases y cumplí en tiempo con mis tareas y actividades.', 'tipo' => 'escala', 'seccion' => 'autoevaluacion', 'orden' => 6, 'activa' => true],
            ['texto' => 'Participé activamente y busqué resolver mis dudas durante el semestre.', 'tipo' => 'escala', 'seccion' => 'autoevaluacion', 'orden' => 7, 'activa' => true],
        ];

        foreach ($preguntas as $pregunta) {
            Pregunta::firstOrCreate(
                ['texto' => $pregunta['texto']],
                $pregunta
            );
        }
    }
}
