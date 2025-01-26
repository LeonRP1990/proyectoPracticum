<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla (opcional si se llama 'doctors')
    protected $table = 'doctors';

    // Permitir asignación masiva
    protected $fillable = [
        'name',        // Nombre del doctor
        'specialty',   // Especialidad del doctor
        'contact',     // Información de contacto del doctor
    ];

    /**
     * Relación con las citas médicas (hasMany).
     * Un doctor puede tener varias citas médicas.
     */
    public function citasMedicas()
    {
        return $this->hasMany(CitaMedica::class, 'doctor_id');
    }
}
