<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateCotizacion extends Mailable
{
    use Queueable, SerializesModels;

    public $cliente;

    public $cotizacion;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cliente, $cotizacion, $aseguradora)
    {
        //
        $this->cliente = $cliente;
        $this->cotizacion = $cotizacion;
        $this->aseguradora = $aseguradora;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->aseguradora == "ANA") {
            return $this->subject('Gracias por usar Autosegurodirecto')->view('emails.cotizacionAna');
        }
        else
            return $this->subject('Gracias por usar Autosegurodirecto')->view('emails.cotizacion');
    }
}
