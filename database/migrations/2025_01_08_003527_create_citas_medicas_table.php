<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('citas_medicas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedBigInteger('paciente_id'); // Relación con patients
            $table->unsignedBigInteger('doctor_id'); // Relación con doctors
            $table->unsignedBigInteger('enfermedad_id')->nullable(); // Relación con enfermedades
            $table->timestamps();

            // Claves foráneas
            $table->foreign('paciente_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->foreign('enfermedad_id')->references('id')->on('enfermedades')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas_medicas');
    }
};
