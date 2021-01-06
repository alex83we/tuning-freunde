<?php

namespace App\Mail\Antrag;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AntragGenehmigtClub extends Mailable
{
    use Queueable, SerializesModels;

    public $antrag;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($antrag)
    {
        $this->antrag = $antrag;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('webmaster@thueringer-tuning-freunde.de')->subject('Mitgliedsantrag von '. $this->antrag['title'] .' wurde genehmigt.')
            ->view('email.antrag.antragGenehmigtClub')->with('antrag', $this->antrag);
    }
}
