<?php

namespace App\Http\Controllers;

use App\Models\CitaMedica;
use App\Models\Enfermedad;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class CitaMedicaController extends Controller
{
    /**
     * Muestra una lista de citas médicas.
     */
    public function index()
    {
        // Cargar citas médicas con sus relaciones
        $citas = CitaMedica::with(['enfermedad', 'paciente', 'doctor'])->get();
        return view('citas_medicas.index', compact('citas'));
    }

    /**
     * Muestra el formulario para crear una nueva cita.
     */
    public function create()
    {
        // Cargar datos necesarios para el formulario
        $pacientes = Patient::all();
        $doctores = Doctor::all();
        $enfermedades = Enfermedad::all();

        return view('citas_medicas.create', compact('pacientes', 'doctores', 'enfermedades'));
    }

    /**
     * Almacena una nueva cita médica.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'paciente_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'enfermedad_id' => 'nullable|exists:enfermedades,id',
        ]);

        // Crear la cita médica
        CitaMedica::create($request->all());

        return redirect()->route('citas_medicas.index')->with('success', 'Cita Médica creada satisfactoriamente.');
    }

    /**
     * Muestra los detalles de una cita médica específica.
     */
    public function show(CitaMedica $citaMedica)
    {
        return view('citas_medicas.show', compact('citaMedica'));
    }

    /**
     * Muestra el formulario para editar una cita médica.
     */
    public function edit($id)
    {
        // Buscar la cita médica por su ID
        $citaMedica = CitaMedica::findOrFail($id);
        
        // Cargar los datos necesarios para el formulario
        $pacientes = Patient::all();
        $doctores = Doctor::all();
        $enfermedades = Enfermedad::all();

        return view('citas_medicas.edit', compact('citaMedica', 'pacientes', 'doctores', 'enfermedades'));
    }

    /**
     * Actualiza una cita médica existente.
     */
    public function update(Request $request, $id)
    {
        // Buscar la cita médica por su ID
        $citaMedica = CitaMedica::findOrFail($id);

        // Validar los datos del formulario
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'paciente_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'enfermedad_id' => 'nullable|exists:enfermedades,id',
        ]);

        // Actualizar la cita médica
        $citaMedica->update($request->all());

        return redirect()->route('citas_medicas.index')->with('success', 'Cita Médica actualizada satisfactoriamente.');
    }

    /**
     * Elimina una cita médica existente.
     */
    public function destroy($id)
    {
        // Buscar la cita médica por su ID
        $citaMedica = CitaMedica::findOrFail($id);

        // Eliminar la cita médica
        $citaMedica->delete();

        return redirect()->route('citas_medicas.index')->with('success', 'Cita Médica eliminada satisfactoriamente.');
    }
}
