<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Agendar Cita Médica</title>
  </head>
  <body>

    <div class="container mt-5">
      <h1 class="mb-4">Agendar Cita Médica</h1>

      <form method="post">
        <!-- Nombre del paciente -->
        <div class="mb-3">
          <label for="patientName" class="form-label">Nombre del Paciente</label>
          <input type="text" class="form-control" id="patientName" name="patientName" placeholder="Nombre completo" required>
        </div>

        <!-- Correo electrónico del paciente -->
        <div class="mb-3">
          <label for="email" class="form-label">Correo Electrónico</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@dominio.com" required>
        </div>

        <!-- Teléfono del paciente -->
        <div class="mb-3">
          <label for="phone" class="form-label">Teléfono</label>
          <input type="tel" class="form-control" id="phone" name="phone" placeholder="(+52) 123 456 7890" required>
        </div>

        <!-- Especialidad médica -->
        <div class="mb-3">
          <label for="specialty" class="form-label">Especialidad Médica</label>
          <select class="form-select" id="specialty" name="specialty" required>
            <option value="">Seleccione una especialidad</option>
            <option value="General">Medicina General</option>
            <option value="Pediatrics">Pediatría</option>
            <option value="Dermatology">Dermatología</option>
            <option value="Cardiology">Cardiología</option>
            <option value="Orthopedics">Ortopedia</option>
            <!-- Agrega más opciones si es necesario -->
          </select>
        </div>

        <!-- Médico disponible -->
        <div class="mb-3">
          <label for="doctor" class="form-label">Médico</label>
          <select class="form-select" id="doctor" name="doctor" required>
            <option value="">Seleccione un médico</option>
            <option value
