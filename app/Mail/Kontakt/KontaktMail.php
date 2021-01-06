<?php

namespace App\Mail\Kontakt;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KontaktMail extends Mailable
{
    use Queueable, SerializesModels;

    public $kontakt;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($kontakt)
    {
        $this->kontakt = $kontakt;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->kontakt['email'] == true) {
            $email = $this->kontakt['email'];
        } else {
            $email = 'noreplay@thueringer-tuning-freunde.de';
        }

        return $this->from($email)->subject('Neue Kontaktanfrage!')
            ->view('email.kontakt.kontakt')->with('kontakt', $this->kontakt);
    }
}
