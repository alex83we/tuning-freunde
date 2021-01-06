<?php

namespace App\Mail\Antrag;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AntragEingang extends Mailable
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
        return $this->from('noreplay@thueringer-tuning-freunde.de')->subject('Dein Mitgliedsantrag bei den Thüringer Tuning Freunden wird geprüft.')
            ->view('email.antrag.antragEingang')->with('team', $this->team);
    }
}
