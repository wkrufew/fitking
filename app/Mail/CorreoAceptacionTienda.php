<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoAceptacionTienda extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $shipping;
    public $product;
    
    public function __construct($data,$shipping,$product)
    {
        $this->data = $data;
        $this->shipping = $shipping;
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.compra-reserva-tienda');
    }
}
