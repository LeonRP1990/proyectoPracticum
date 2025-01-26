<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitaMedica extends Model
{
    use HasFactory;

    /**
     * Tabla asociada al modelo (opcional si sigue la convención de nombres).
     */
    protected $table = 'citas_medicas';

    /**
     * Atributos que se pueden asignar masivamente.
     */
    protected $fillable = [
        'fecha',
        'hora',
        'paciente_id',
        'doctor_id',
        'enfermedad_id',
    ];

    /**
     * Relación con el modelo `Patient`.
     * Una cita médica pertenece a un paciente.
     */
    public function paciente()
    {
        return $this->belongsTo(Patient::class, 'paciente_id');
    }

    /**
     * Relación con el modelo `Doctor`.
     * Una cita médica pertenece a un doctor.
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    /**
     * Relación con el modelo `Enfermedad`.
     * Una cita médica puede estar asociada a una enfermedad.
     */
    public function enfermedad()
    {
        return $this->belongsTo(Enfermedad::class, 'enfermedad_id');
    }
}
