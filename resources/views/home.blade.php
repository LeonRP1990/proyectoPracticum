@extends('layouts.master')

@section('title', 'Inicio - Hospital Isidro Ayora')

@section('content')
    <main class="jumbotron text-center bg-light shadow-lg p-5 rounded" role="main" aria-labelledby="page-title">
        <!-- Imagen destacada -->
        <img 
            src="{{ asset('imagenes/FOTO.jpg') }}" 
            alt="Vista del Hospital Isidro Ayora" 
            class="img-fluid rounded mb-4 shadow-sm"
            style="max-width: 100%; height: auto;"
        >
        <!-- Título y contenido -->
        <h1 id="page-title" class="display-4 text-primary font-weight-bold">Bienvenido al Hospital Isidro Ayora</h1>
        <p class="lead text-secondary">Gestión eficiente de Pacientes y Doctores</p>
        <hr class="my-4 border-primary">
        <p class="text-muted">Utilice la barra de navegación superior para explorar las funcionalidades disponibles en el sistema.</p>
    </main>
@endsection
