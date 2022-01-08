<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoAprobacionPlan extends Mailable
{
    use Queueable, SerializesModels;

    public $curso;
    public $alumno;

    public $subject = "Asignacion de Plan";

    public function __construct($curso,$alumno)
    {
        $this->curso = $curso;
        $this->alumno = $alumno;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.aprobacion-reserva');
    }
}
