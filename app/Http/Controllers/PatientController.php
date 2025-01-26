<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Muestra una lista de pacientes.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    /**
     * Muestra el formulario para crear un nuevo paciente.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Almacena un nuevo paciente en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'contact' => 'required|string|max:255',
            'email' => 'nullable|email|max:255', // Agregamos validación para el email
        ]);

        Patient::create($request->all());
        return redirect()->route('patients.index')->with('success', 'Paciente creado satisfactoriamente');
    }

    /**
     * Muestra los detalles de un paciente específico.
     */
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Muestra el formulario para editar un paciente existente.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Actualiza un paciente en la base de datos.
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'contact' => 'required|string|max:255',
            'email' => 'nullable|email|max:255', // Validación para el email
        ]);

        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success', 'Paciente actualizado satisfactoriamente');
    }

    /**
     * Elimina un paciente de la base de datos.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Paciente eliminado satisfactoriamente');
    }
}
