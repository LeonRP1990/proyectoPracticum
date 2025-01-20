<?php

namespace App\Http\Controllers;


use App\Models\CitaMedica;
use App\Models\Enfermedad;
use Illuminate\Http\Request;

class CitaMedicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = CitaMedica::with('enfermedad')->get();
        return view('citas_medicas.index', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enfermedades = Enfermedad::all();
        return view('citas_medicas.create', compact('enfermedades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date',
            'paciente_id' => 'required|integer',
            'doctor_id' => 'nullable|integer',
            'enfermedad_id' => 'nullable|integer',
        ]);

        CitaMedica::create($request->all());
        return redirect()->route('citas_medicas.index')->with('success','Citas Medicas se creo satisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CitaMedica $citaMedica)
    {
        
        $enfermedades = Enfermedad::all();
        return view('citas_medicas.edit',compact('citaMedica','enfermedades'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CitaMedica $citaMedica)
    {
        $request->validate([
            'fecha' => 'requered|date',
            'hora' => 'requered',
            'paciente_id' => 'requered|integer',
            'doctor_id' => 'requered|integer',
            'enfermedad_id' => 'nullable|integer',
        ]);

        $citaMedica->update($request->all());
        return redirect()->route('citas_medicas.index')->with('success','Citas Medicas actualizada satisfactoriamente');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CitaMedica $citaMedica)
    {
        $citaMedica->delete();
        return redirect()->route('citas_medicas.index')->with('success','Citas Medicas eliminada satisfactoriamente');

    }
}
