<?php

namespace App\Http\Controllers\Frontend\Kontakt;

use App\Http\Controllers\Controller;
use App\Mail\Kontakt\KontaktMail;
use App\Models\Frontend\Kontakt\Kontakt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class KontaktController extends Controller
{
    public function index()
    {
        return view('frontend.kontakt.index');
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'subject' => 'required|min:8',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $kontakt = new Kontakt();
        $kontakt->name = $request->name;
        $kontakt->email = $request->email;
        $kontakt->subject = $request->subject;
        $kontakt->message = $request->message;

        Mail::to('info@thueringer-tuning-freunde.de')->send(new KontaktMail($kontakt));
        toastr()->success('Kontaktanfrage wurde abgesendet!');
        return redirect()->back();
    }
}
