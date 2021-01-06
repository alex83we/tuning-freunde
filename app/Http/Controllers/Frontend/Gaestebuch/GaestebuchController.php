<?php

namespace App\Http\Controllers\Frontend\Gaestebuch;

use App\Http\Controllers\Controller;
use App\Mail\Gaestebuch\GaestebuchEintrag;
use App\Models\Frontend\Gaestebuch\Gaestebuch;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class GaestebuchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $gaestebuchs = Gaestebuch::orderBy('created_at', 'DESC')->get();

        return view('frontend.gaestebuch.index', compact('gaestebuchs', $gaestebuchs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('frontend.gaestebuch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => 'required|min:4|max:50',
            "email" => 'required|email',
            "message" => 'required',
        ]);

        $gästebuch = new Gaestebuch();
        $gästebuch->name = $request->name;
        $gästebuch->email = $request->email;
        $gästebuch->website = $request->website;
        $gästebuch->facebook = $request->facebook;
        $gästebuch->twitter = $request->twitter;
        $gästebuch->instagram = $request->instagram;
        $gästebuch->message = $request->message;
        $gästebuch->published = 0;
        $gästebuch->save();

        Mail::to('info@thueringer-tuning-freunde.de')->send(new GaestebuchEintrag($gästebuch));
        toastr()->success('Gästebuch eintrag wurde eingesandt.');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Gaestebuch $gaestebuch
     * @return RedirectResponse
     */
    public function update(Request $request, Gaestebuch $gaestebuch)
    {
        $gaestebuch->published = $request->published;
        $gaestebuch->published_at = now();
        $gaestebuch->save();

        toastr()->success('Gästebucheintrag freigegeben.');
        return redirect()->route('frontend.gaestebuch.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Gaestebuch $gaestebuch
     * @return RedirectResponse
     */
    public function destroy(Gaestebuch $gaestebuch)
    {
        $gaestebuch->delete();
        toastr()->error('Gästebucheintrag wurde gelöscht!');
        return redirect()->route('frontend.gaestebuch.index');
    }
}
