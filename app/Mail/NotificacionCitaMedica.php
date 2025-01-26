namespace App\Mail;

use App\Models\CitaMedica;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionCitaMedica extends Mailable
{
    use Queueable, SerializesModels;

    public $citaMedica;

    public function __construct(CitaMedica $citaMedica)
    {
        $this->citaMedica = $citaMedica;
    }

    public function build()
    {
        return $this->subject('Detalles de su Cita Médica')
                    ->view('emails.notificacion_cita_medica');
    }
}
