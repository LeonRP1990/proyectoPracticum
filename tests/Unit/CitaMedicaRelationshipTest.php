<?php
namespace Tests\Unit;

use App\Models\CitaMedica;
use Tests\TestCase;

class CitaMedicaRelationshipTest extends TestCase
{
    /**
     * Validar la relación entre cita médica y enfermedad
     */
    public function test_cita_medica_tiene_relacion_con_enfermedad()
    {
        $cita = new CitaMedica();

        // Verificar que exista la relación con enfermedad
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\BelongsTo::class,
            $cita->enfermedad()
        );
    }
}
