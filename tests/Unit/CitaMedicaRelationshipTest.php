<?php

namespace Tests\Unit;

use App\Models\CitaMedica;
use PHPUnit\Framework\TestCase;

class CitaMedicaRelationshipTest extends TestCase
{
    /**
     * Validar la relación entre cita medica y enfermedad
     */

     public function test_cita_medica_tiene_relacion_con_enfermedad(){

        $cita = new CitaMedica();

        // Verificar que exita la relacion con enfermedad

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class, $cita->enfermedad());



     }


    
}
