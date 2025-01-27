<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\CitaMedica;
use Tests\TestCase;

class CitaMedicaDeleteTest extends TestCase
{
    use RefreshDatabase; // Asegura que la base de datos se reinicia en cada prueba

    /**
     * Test para verificar la eliminación de una cita médica.
     */
    public function test_eliminar_cita_medica_devuelve_estado_200()
    {
        // Crear una cita médica en la base de datos de prueba
        $citaMedica = CitaMedica::factory()->create();

        // Realizar una solicitud DELETE al endpoint de eliminación
        $response = $this->delete(route('citas_medicas.destroy', $citaMedica->id));

        // Verificar que la respuesta tiene un estado 200 OK
        $response->assertStatus(200);

        // Verificar que la cita médica ha sido eliminada de la base de datos
        $this->assertDatabaseMissing('citas_medicas', ['id' => $citaMedica->id]);

        // Verificar que se muestra un mensaje de éxito en la respuesta
        $response->assertSeeText('Cita Médica eliminada satisfactoriamente.');
    }
}
