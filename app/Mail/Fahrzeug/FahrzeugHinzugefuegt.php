<?php

namespace App\Mail\Fahrzeug;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FahrzeugHinzugefuegt extends Mailable
{
    use Queueable, SerializesModels;

    public $fahrzeuge;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fahrzeuge)
    {
        $this->fahrzeuge = $fahrzeuge;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(auth()->user()->email)->subject('Neues Fahrzeug wurde angelegt von '. auth()->user()->vorname.' '. auth()->user()->nachname. '.')
            ->view('email.fahrzeug.FahrzeugHinzugefuegt')->with('fahrzeuge', $this->fahrzeuge);
    }
}
