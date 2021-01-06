<?php

namespace App\Http\Controllers\Auth;

use Spatie\WelcomeNotification\WelcomeController as BaseWelcomeController;
use Symfony\Component\HttpFoundation\Response;

class WelcomeController extends BaseWelcomeController
{
    public function sendPasswordSavedResponse(): Response
    {
        return redirect()->route('home');
    }

    public function rules()
    {
        return [
            'password' => 'required|confirmed|min:8',
        ];
    }
}
