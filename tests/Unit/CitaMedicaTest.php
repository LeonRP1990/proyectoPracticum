<?php

namespace Tests\Unit;

use App\Models\CitaMedica;
use PHPUnit\Framework\TestCase;

class CitaMedicaTest extends TestCase
{
    /**
     * Creacion de cita medica en memoria 
     */
    public function test_creacion_cita_medica_en_memoria()
    {
        $cita = new CitaMedica([
            'fecha'=>'2025-01-14',
            'hora'=>'19:58',
            'paciente_id'=>1,
            'doctor_id'=>1,
            'enfermedad_id'=>2,
        ]);

        $this->assertEquals('2025-01-14', $cita->fecha);
        $this->assertEquals('19:58', $cita->hora);
        $this->assertEquals(1, $cita->paciente_id);
        $this->assertEquals(1, $cita->doctor_id);
        $this->assertEquals(2, $cita->enfermedad_id);
    }

    /**
     * Verficar que los fillable este correctos
     */

     public function test_fillable_doctor(){

        $cita = new CitaMedica();
        $this->assertEquals([
            'fecha',
            'hora',
            'paciente_id',
            'doctor_id',
            'enfermedad_id',
        ],$cita->getFillable());
     }


}
