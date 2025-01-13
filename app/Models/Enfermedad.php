<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Enfermedad extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function citasMedicas(){

        return $this->hasMany(CitaMedica::class);
        
    }

}
