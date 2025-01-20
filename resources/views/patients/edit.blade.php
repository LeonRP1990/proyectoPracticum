@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Editar Paciente</h2>
    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $patient->name }}" required>
        </div>
        <div class="form-group">
            <label for="age">Edad</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ $patient->age }}" required>
        </div>
        <div class="form-group">
            <label for="contact">Contacto</label>
            <input type="text" class="form-control" id="contact" name="contact" value="{{ $patient->contact }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
