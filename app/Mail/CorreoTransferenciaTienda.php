<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoTransferenciaTienda extends Mailable
{
    use Queueable, SerializesModels;

    public $content;

    public $subject = "Reserva Tienda FitKing";

    public function __construct($data,$shipping,$content)
    {
        $this->data = $data;
        $this->shipping = $shipping;
        $this->content = $content;
    }
    
    public function build()
    {
        return $this->view('mail.compra-transferencia')->with([
            'data' => $this->data,
            'shipping' => $this->shipping
        ]);
    }
}
