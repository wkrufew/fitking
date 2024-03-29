<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CorreoAceptacionTienda extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $data;
    public $shipping;
    public $product;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$shipping,$product)
    {
         $this->data = $data;
        $this->shipping = $shipping;
        $this->product = $product;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Aprobacion de Pago',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.compra-reserva-tienda',
            /* with: [
                'product' => $this->product,
                'data' => $this->data,
                'shipping' => $this->shipping
            ], */
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
