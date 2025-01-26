@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Editar Cita Médica</h1>
    <form action="{{ route('citas_medicas.update', $citaMedica->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Fecha -->
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input 
                type="date" 
                name="fecha" 
                id="fecha" 
                class="form-control @error('fecha') is-invalid @enderror" 
                value="{{ old('fecha', $citaMedica->fecha) }}" 
                required>
            @error('fecha')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Hora -->
        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input 
                type="time" 
                name="hora" 
                id="hora" 
                class="form-control @error('hora') is-invalid @enderror" 
                value="{{ old('hora', $citaMedica->hora) }}" 
                required>
            @error('hora')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Paciente -->
        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select 
                name="paciente_id" 
                id="paciente_id" 
                class="form-control @error('paciente_id') is-invalid @enderror" 
                required>
                <option value="">Seleccionar</option>
                @foreach ($pacientes as $paciente)
                    <option 
                        value="{{ $paciente->id }}" 
                        {{ old('paciente_id', $citaMedica->paciente_id) == $paciente->id ? 'selected' : '' }}>
                        {{ $paciente->name }}
                    </option>
                @endforeach
            </select>
            @error('paciente_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Doctor -->
        <div class="mb-3">
            <label for="doctor_id" class="form-label">Doctor</label>
            <select 
                name="doctor_id" 
                id="doctor_id" 
                class="form-control @error('doctor_id') is-invalid @enderror" 
                required>
                <option value="">Seleccionar</option>
                @foreach ($doctores as $doctor)
                    <option 
                        value="{{ $doctor->id }}" 
                        {{ old('doctor_id', $citaMedica->doctor_id) == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }} ({{ $doctor->specialty }})
                    </option>
                @endforeach
            </select>
            @error('doctor_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Enfermedad -->
        <div class="mb-3">
            <label for="enfermedad_id" class="form-label">Enfermedad</label>
            <select 
                name="enfermedad_id" 
                id="enfermedad_id" 
                class="form-control @error('enfermedad_id') is-invalid @enderror">
                <option value="">Seleccionar</option>
                @foreach ($enfermedades as $enfermedad)
                    <option 
                        value="{{ $enfermedad->id }}" 
                        {{ old('enfermedad_id', $citaMedica->enfermedad_id) == $enfermedad->id ? 'selected' : '' }}>
                        {{ $enfermedad->nombre }}
                    </option>
                @endforeach
            </select>
            @error('enfermedad_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Botón de guardar -->
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
