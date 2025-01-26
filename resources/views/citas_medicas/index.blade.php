@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Listado de Citas Médicas</h1>

    <!-- Botón para crear una nueva cita -->
    <a href="{{ route('citas_medicas.create') }}" class="btn btn-primary mb-3">Crear Cita Médica</a>

    <!-- Mensajes de éxito -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabla de citas médicas -->
    @if ($citas->isEmpty())
        <p class="text-center">No hay citas médicas registradas.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Paciente</th>
                    <th>Doctor</th>
                    <th>Enfermedad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($citas as $cita)
                    <tr>
                        <td>{{ $cita->id }}</td>
                        <td>{{ $cita->fecha }}</td>
                        <td>{{ $cita->hora }}</td>
                        <td>{{ $cita->paciente->name ?? 'Sin asignar' }}</td>
                        <td>{{ $cita->doctor->name ?? 'Sin asignar' }}</td>
                        <td>{{ $cita->enfermedad->nombre ?? 'Sin asignar' }}</td>
                        <td>
                            <!-- Botón para editar -->
                            <a href="{{ route('citas_medicas.edit', $cita->id) }}" class="btn btn-warning btn-sm">Editar</a>

                            <!-- Botón para eliminar -->
                            <form action="{{ route('citas_medicas.destroy', $cita->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta cita?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
