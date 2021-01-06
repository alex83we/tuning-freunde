<?php

namespace App\Mail\Antrag;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AntragEingangAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $team;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($team)
    {
        $this->team = $team;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->team['email'] == true) {
            $email = $this->team['email'];
        } else {
            $email = 'noreplay@thueringer-tuning-freunde.de';
        }

        return $this->from($email)->subject('Neuer Mitgliedsantrag ist eingegangen.')
            ->view('email.antrag.antragEingangAdmin')->with('team', $this->team);
    }
}
