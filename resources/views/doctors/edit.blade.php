@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Editar Doctor</h2>
    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $doctor->name }}" required>
        </div>
        <div class="form-group">
            <label for="specialty">Especialidad</label>
            <input type="text" class="form-control" id="specialty" name="specialty" value="{{ $doctor->specialty }}" required>
        </div>
        <div class="form-group">
            <label for="contact">Contacto</label>
            <input type="text" class="form-control" id="contact" name="contact" value="{{ $doctor->contact }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
