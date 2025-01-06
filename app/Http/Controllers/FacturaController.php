<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Doctor;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las facturas con la relación de Doctor (cargando los datos del doctor relacionado)
        $facturas = Factura::with('doctor')->get();
        return view('facturas.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los doctores para la selección en el formulario
        $doctors = Doctor::all();
        return view('facturas.create', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validated = $request->validate([
            'patient_name' => 'required|string|max:255',
            'doctor_id' => 'required|exists:doctors,id',  // El doctor debe existir
            'amount' => 'required|numeric|min:0',  // El monto debe ser un número positivo
            'issued_date' => 'required|date|before_or_equal:today',  // La fecha de emisión debe ser hoy o antes
            'due_date' => 'required|date|after_or_equal:issued_date',  // La fecha de vencimiento debe ser después de la fecha de emisión
            'status' => 'required|in:pendiente,pagada',  // Estado de la factura
        ]);

        // Crear una nueva factura en la base de datos
        Factura::create($validated);

        // Redirigir al listado de facturas con un mensaje de éxito
        return redirect()->route('facturas.index')->with('success', 'Factura generada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Factura $factura)
    {
        // Mostrar los detalles de la factura específica
        return view('facturas.show', compact('factura'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura)
    {
        // Obtener todos los doctores y pasar los datos de la factura para editarla
        $doctors = Doctor::all();
        return view('facturas.edit', compact('factura', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factura $factura)
    {
        // Validar los datos recibidos para la actualización
        $validated = $request->validate([
            'patient_name' => 'required|string|max:255',
            'doctor_id' => 'required|exists:doctors,id',  // El doctor debe existir
            'amount' => 'required|numeric|min:0',  // El monto debe ser un número positivo
            'issued_date' => 'required|date|before_or_equal:today',
            'due_date' => 'required|date|after_or_equal:issued_date',  // La fecha de vencimiento debe ser después de la fecha de emisión
            'status' => 'required|in:pendiente,pagada',
        ]);

        // Actualizar la factura con los nuevos datos
        $factura->update($validated);

        // Redirigir a la lista de facturas con un mensaje de éxito
        return redirect()->route('facturas.index')->with('success', 'Factura actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factura $factura)
    {
        // Eliminar la factura de la base de datos
        $factura->delete();

        // Redirigir a la lista de facturas con un mensaje de éxito
        return redirect()->route('facturas.index')->with('success', 'Factura eliminada con éxito.');
    }
}
