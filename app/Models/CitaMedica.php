<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitaMedica extends Model
{
    use HasFactory;

    /**
     * Tabla asociada al modelo.
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
        return $this->belongsTo(Patient::class);
    }

    /**
     * Relación con el modelo `Doctor`.
     * Una cita médica pertenece a un doctor.
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Relación con el modelo `Enfermedad`.
     * Una cita médica puede estar asociada a una enfermedad.
     */
    public function enfermedad()
    {
        return $this->belongsTo(Enfermedad::class);
    }

    /**
     * Relación con el modelo `Receta`.
     * Una cita médica puede tener muchas recetas.
     */
    public function recetas()
    {
        return $this->hasMany(Receta::class);
    }
}
