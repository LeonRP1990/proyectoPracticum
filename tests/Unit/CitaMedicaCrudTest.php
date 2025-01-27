<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\CitaMedica;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CitaMedicaCrudTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test para crear una cita médica.
     */
    public function test_crear_cita_medica()
    {
        $paciente = Patient::factory()->create();
        $doctor = Doctor::factory()->create();

        $cita = CitaMedica::create([
            'fecha' => '2025-02-01',
            'hora' => '10:00:00',
            'paciente_id' => $paciente->id,
            'doctor_id' => $doctor->id,
        ]);

        $this->assertDatabaseHas('citas_medicas', [
            'fecha' => '2025-02-01',
            'hora' => '10:00:00',
            'paciente_id' => $paciente->id,
            'doctor_id' => $doctor->id,
        ]);
    }

    /**
     * Test para leer una cita médica.
     */
    public function test_leer_cita_medica()
    {
        $cita = CitaMedica::factory()->create([
            'fecha' => '2025-02-01',
            'hora' => '10:00:00',
        ]);

        $this->assertModelExists($cita);
        $this->assertEquals('2025-02-01', $cita->fecha);
        $this->assertEquals('10:00:00', $cita->hora);
    }

    /**
     * Test para actualizar una cita médica.
     */
    public function test_actualizar_cita_medica()
    {
        $cita = CitaMedica::factory()->create();

        $cita->update(['hora' => '12:00:00']);

        $this->assertDatabaseHas('citas_medicas', [
            'id' => $cita->id,
            'hora' => '12:00:00',
        ]);
    }

    /**
     * Test para eliminar una cita médica.
     */
    public function test_eliminar_cita_medica()
    {
        $cita = CitaMedica::factory()->create();

        $cita->delete();

        $this->assertModelMissing($cita);
        $this->assertDatabaseMissing('citas_medicas', [
            'id' => $cita->id,
        ]);
    }
}
