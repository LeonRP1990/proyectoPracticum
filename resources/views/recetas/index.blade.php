@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Recetas para la Cita Médica #{{ $citaMedica->id }}</h1>
    <a href="{{ route('recetas.create', $citaMedica->id) }}" class="btn btn-primary mb-3">Agregar Receta</a>

    @if($citaMedica->recetas->isEmpty())
        <p>No hay recetas registradas.</p>
    @else
        <ul>
            @foreach ($citaMedica->recetas as $receta)
                <li>
                    {{ $receta->descripcion }}
                    <a href="{{ route('recetas.edit', $receta->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('recetas.destroy', $receta->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
