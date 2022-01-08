<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoPlan extends Mailable
{
    use Queueable, SerializesModels;

    public $plan;

    public $subject = "Suscripcion de Plan";

    public function __construct($plan)
    {
        $this->plan = $plan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.plan');
    }
}
