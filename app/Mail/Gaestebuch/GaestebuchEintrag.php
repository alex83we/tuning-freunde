<?php

namespace App\Mail\Gaestebuch;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GaestebuchEintrag extends Mailable
{
    use Queueable, SerializesModels;

    public $gästebuch;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($gästebuch)
    {
        $this->gästebuch = $gästebuch;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->gästebuch['email'] == true) {
            $email = $this->gästebuch['email'];
        } else {
            $email = 'noreplay@thueringer-tuning-freunde.de';
        }

        return $this->from($email)->subject('Neuer Gästebucheintrag ist eingegangen!')
            ->view('email.gaestebuch.gaestebuchEintrag')->with('gästebuch', $this->gästebuch);
    }
}
