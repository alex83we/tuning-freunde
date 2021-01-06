<?php

namespace App\Mail\Veranstaltungen;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VeranstaltungenEdit extends Mailable
{
    use Queueable, SerializesModels;

    public $veranstaltungen;

    /**
     * Create a new message instance.
     *
     * @param $veranstaltungen
     */
    public function __construct($veranstaltungen)
    {
        $this->veranstaltungen = $veranstaltungen;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreplay@thueringer-tuning-freunde.de')->subject('Veranstaltung wurde bearbeitet!')
            ->view('email.veranstaltungen.veranstaltungenEdit')->with('veranstaltungen', $this->veranstaltungen);
    }
}
