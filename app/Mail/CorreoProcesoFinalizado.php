<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoProcesoFinalizado extends Mailable
{
    use Queueable, SerializesModels;

    public $orden;

    public function __construct($orden)
    {
        $this->orden = $orden;
    }

    public function build()
    {
        return $this->view('mail.proceso-finalizado')->with(['orden' => $this->orden]);
    }
}
