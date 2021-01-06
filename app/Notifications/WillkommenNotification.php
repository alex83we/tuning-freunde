<?php

namespace App\Notifications;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Spatie\WelcomeNotification\WelcomeNotification;

class WillkommenNotification extends WelcomeNotification
{
    public function buildWelcomeNotificationMessage(): MailMessage
    {
        return (new MailMessage)
            ->subject('Dein Benutzeraccount bei den Thüringer Tuning Freunden wurde angelegt.')
            ->action(\Lang::get('Lege ein Passwort fest.'), $this->showWelcomeFormUrl);
    }
}
