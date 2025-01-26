<!DOCTYPE html>
<html>
<head>
    <title>Notificación de Cita Médica</title>
</head>
<body>
    <h1>Detalles de su Cita Médica</h1>
    <p>Estimado/a {{ $citaMedica->paciente->name }},</p>
    <p>Estos son los detalles de su cita:</p>
    <ul>
        <li><strong>Fecha:</strong> {{ $citaMedica->fecha }}</li>
        <li><strong>Hora:</strong> {{ $citaMedica->hora }}</li>
        <li><strong>Doctor:</strong> {{ $citaMedica->doctor->name }}</li>
        @if ($citaMedica->enfermedad)
            <li><strong>Motivo:</strong> {{ $citaMedica->enfermedad->nombre }}</li>
        @endif
    </ul>
    <p>Por favor, no falte a su cita.</p>
</body>
</html>
