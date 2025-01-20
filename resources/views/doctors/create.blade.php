@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Crear Doctor</h2>
    <form action="{{ route('doctors.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="specialty">Especialidad</label>
            <input type="text" class="form-control" id="specialty" name="specialty" required>
        </div>
        <div class="form-group">
            <label for="contact">Contacto</label>
            <input type="text" class="form-control" id="contact" name="contact" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
