@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Crear Cita Médica</h1>
    <form action="{{ route('citas_medicas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" name="hora" id="hora" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="enfermedad_id" class="form-label">Enfermedad</label>
            <select name="enfermedad_id" id="enfermedad_id" class="form-control">
                <option value="">Seleccionar</option>
                @foreach ($enfermedades as $enfermedad)
                    <option value="{{ $enfermedad->id }}">{{ $enfermedad->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
