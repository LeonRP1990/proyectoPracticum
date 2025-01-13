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
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('enfermedad_id')->nullable();
            $table->timestamps();

            $table->foreign('enfermedad_id')->references('id')->on('enfermedades')->onDelete('cascade');

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
