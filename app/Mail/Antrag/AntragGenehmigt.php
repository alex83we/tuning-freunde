<?php

namespace App\Mail\Antrag;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AntragGenehmigt extends Mailable
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
        return $this->from('webmaster@thueringer-tuning-freunde.de')->subject('Hallo ' . $this->antrag['title'] . ' dein Mitgliedsantrag wurde genehmigt.')
            ->view('email.antrag.antragGenehmigt')->with('antrag', $this->antrag);
    }
}
