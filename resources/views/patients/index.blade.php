@extends('layouts.master')

@section('title', 'Patients - Hospital Management')

@section('content')
    <h2>Patients</h2>
    <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Crear Pacientes</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Age</th>
                <th>Contact</th>
                <th>Email</th> <!-- Nueva columna para mostrar el email -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->age }}</td>
                    <td>{{ $patient->contact }}</td>
                    <td>{{ $patient->email ?? 'No especificado' }}</td> <!-- Mostrar email o "No especificado" -->
                    <td>
                        <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
