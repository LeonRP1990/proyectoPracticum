@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Listado de Enfermedades</h1>
    <a href="{{ route('enfermedades.create') }}" class="btn btn-primary mb-3">Crear Enfermedad</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enfermedades as $enfermedad)
                <tr>
                    <td>{{ $enfermedad->id }}</td>
                    <td>{{ $enfermedad->nombre }}</td>
                    <td>{{ $enfermedad->descripcion }}</td>
                    <td>
                        <a href="{{ route('enfermedades.edit', $enfermedad->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('enfermedades.destroy', $enfermedad->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
