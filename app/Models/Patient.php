<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla (opcional si se llama 'patients')
    protected $table = 'patients';

    // Permitir asignación masiva
    protected $fillable = [
        'name',     // Nombre del paciente
        'age',      // Edad del paciente
        'contact',  // Información de contacto
        'email',
    ];

    /**
     * Relación con las citas médicas (hasMany).
     * Un paciente puede tener varias citas médicas.
     */
    public function citasMedicas()
    {
        return $this->hasMany(CitaMedica::class, 'paciente_id');
    }
}
