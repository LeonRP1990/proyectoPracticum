@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Detalles del Paciente</h2>
    <p><strong>Nombre:</strong> {{ $patient->name }}</p>
    <p><strong>Edad:</strong> {{ $patient->age }}</p>
    <p><strong>Contacto:</strong> {{ $patient->contact }}</p>
    <a href="{{ route('patients.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
