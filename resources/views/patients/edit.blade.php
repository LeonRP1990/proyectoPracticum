@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Editar Paciente</h2>
    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <div class="form-group">
            <label for="name">Nombre</label>
            <input 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                id="name" 
                name="name" 
                value="{{ old('name', $patient->name) }}" 
                required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Edad -->
        <div class="form-group">
            <label for="age">Edad</label>
            <input 
                type="number" 
                class="form-control @error('age') is-invalid @enderror" 
                id="age" 
                name="age" 
                value="{{ old('age', $patient->age) }}" 
                required>
            @error('age')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Contacto -->
        <div class="form-group">
            <label for="contact">Contacto</label>
            <input 
                type="text" 
                class="form-control @error('contact') is-invalid @enderror" 
                id="contact" 
                name="contact" 
                value="{{ old('contact', $patient->contact) }}" 
                required>
            @error('contact')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Correo Electrónico -->
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input 
                type="email" 
                class="form-control @error('email') is-invalid @enderror" 
                id="email" 
                name="email" 
                value="{{ old('email', $patient->email) }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Botón de Actualizar -->
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
