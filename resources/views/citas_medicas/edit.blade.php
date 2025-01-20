@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Editar Cita Médica</h1>
    <form action="{{ route('citas_medicas.update', $citaMedica->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $citaMedica->fecha }}" required>
        </div>
        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" name="hora" id="hora" class="form-control" value="{{ $citaMedica->hora }}" required>
        </div>
        <div class="mb-3">
            <label for="enfermedad_id" class="form-label">Enfermedad</label>
            <select name="enfermedad_id" id="enfermedad_id" class="form-control">
                <option value="">Seleccionar</option>
                @foreach ($enfermedades as $enfermedad)
                    <option value="{{ $enfermedad->id }}" {{ $citaMedica->enfermedad_id == $enfermedad->id ? 'selected' : '' }}>
                        {{ $enfermedad->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
