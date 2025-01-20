@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Detalles del Doctor</h2>
    <p><strong>Nombre:</strong> {{ $doctor->name }}</p>
    <p><strong>Especialidad:</strong> {{ $doctor->specialty }}</p>
    <p><strong>Contacto:</strong> {{ $doctor->contact }}</p>
    <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
