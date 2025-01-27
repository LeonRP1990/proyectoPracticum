<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Receta;
use App\Models\CitaMedica;

class RecetaTest extends TestCase
{
    public function test_crear_receta()
    {
        $cita = CitaMedica::factory()->create();

        $receta = Receta::create([
            'descripcion' => 'Tomar una tableta diaria.',
            'cita_medica_id' => $cita->id,
        ]);

        $this->assertDatabaseHas('recetas', [
            'descripcion' => 'Tomar una tableta diaria.',
            'cita_medica_id' => $cita->id,
        ]);
    }
}
