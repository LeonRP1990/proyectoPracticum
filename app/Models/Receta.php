namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = [
        'cita_medica_id',
        'descripcion',
    ];

    /**
     * Relación con el modelo `CitaMedica`.
     * Una receta pertenece a una cita médica.
     */
    public function citaMedica()
    {
        return $this->belongsTo(CitaMedica::class);
    }
}
