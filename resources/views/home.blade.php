@extends('layouts.app')

@section('title', 'Dashboard - Hospital Management')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">{{ __('Panel de Control') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5>{{ __('¡Bienvenido!') }}</h5>
                    <p>{{ __('Has iniciado sesión correctamente. Usa el menú superior para navegar entre las secciones disponibles.') }}</p>

                    <div class="mt-4">
                        <a href="{{ route('citas_medicas.index') }}" class="btn btn-outline-primary">
                            {{ __('Ver Citas Médicas') }}
                        </a>
                        <a href="{{ route('patients.index') }}" class="btn btn-outline-secondary">
                            {{ __('Administrar Pacientes') }}
                        </a>
                        <a href="{{ route('doctors.index') }}" class="btn btn-outline-success">
                            {{ __('Administrar Doctores') }}
                        </a>
                        <a href="{{ route('enfermedades.index') }}" class="btn btn-outline-danger">
                            {{ __('Ver Enfermedades') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
