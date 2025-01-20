<?php

namespace Tests\Unit;

use App\Models\Enfermedad;
use PHPUnit\Framework\TestCase;

class EnfermedadTest extends TestCase
{
    /**
     * Verficar que un modelo enfermedad se cree correctamente en memoria.
     */
    public function test_creacion_enfermedad_en_memoria()
    {
        $enfermedad = new Enfermedad(['nombre'=>'Faringitis','descripcion' => 'Inflamacion en la garganta',]);

        $this->assertEquals('Faringitis',$enfermedad->nombre);
        $this->assertEquals('Inflamacion en la garganta',$enfermedad->descripcion);
    }

    /**
     * Verficar que los fillable este correctos
     */

     public function test_fillable_enfermedad(){

        $enfermedad = new Enfermedad();
        $this->assertEquals([
            'nombre',
            'descripcion',
        ],$enfermedad->getFillable());
     }

}
