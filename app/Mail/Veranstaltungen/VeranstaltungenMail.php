<?php

namespace App\Mail\Veranstaltungen;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VeranstaltungenMail extends Mailable
{
    use Queueable, SerializesModels;

    public $veranstaltungen;

    /**
     * Create a new message instance.
     *
     * @return void
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
        return $this->from('noreplay@thueringer-tuning-freunde.de')->subject('Neue Veranstaltung eingegangen!')
            ->view('email.veranstaltungen.veranstaltungen')->with('veranstaltungen', $this->veranstaltungen);
    }
}
