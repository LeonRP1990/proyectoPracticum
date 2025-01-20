<?php

namespace Tests\Unit;

use App\Models\Doctor;
use PHPUnit\Framework\TestCase;

class DoctorTest extends TestCase
{
    /**
     * Verficar que un modelo enfermedad se cree correctamente en memoria.
     */
    public function test_creacion_doctor_en_memoria()
    {
        $doctor = new Doctor(['name'=>'Xavier','specialty' => 'Gastroenterologo','contact'=>'12345678',]);

        $this->assertEquals('Xavier',$doctor->name);
        $this->assertEquals('Gastroenterologo',$doctor->specialty);
        $this->assertEquals('12345678',$doctor->contact);
    }

    /**
     * Verficar que los fillable este correctos
     */

     public function test_fillable_doctor(){

        $doctor = new Doctor();
        $this->assertEquals([
            'name',
            'specialty',
            'contact',
        ],$doctor->getFillable());
     }

}
