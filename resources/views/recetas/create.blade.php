@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Agregar Receta</h1>

    <form action="{{ route('recetas.store', $citaMedica->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
