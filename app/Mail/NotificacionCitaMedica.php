<?php

namespace App\Mail;

use App\Models\CitaMedica;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionCitaMedica extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * La instancia de la cita médica.
     *
     * @var CitaMedica
     */
    public $citaMedica;

    /**
     * Crea una nueva instancia del mailable.
     *
     * @param CitaMedica $citaMedica
     */
    public function __construct(CitaMedica $citaMedica)
    {
        $this->citaMedica = $citaMedica;
    }

    /**
     * Construye el mensaje.
     */
    public function build()
    {
        return $this->subject('Detalles de su Cita Médica')
                    ->view('emails.notificacion_cita_medica');
    }
}