<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoProcesoEntrega extends Mailable
{
    use Queueable, SerializesModels;

    public $orden;
    public function __construct($orden)
    {
        $this->orden = $orden;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.proceso-entrega')->with(['orden'=> $this->orden]);
    }
}
