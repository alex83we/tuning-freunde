<?php

namespace App\Http\Controllers\Frontend\Veranstaltungen;

use App\Http\Controllers\Controller;
use App\Mail\Veranstaltungen\VeranstaltungenEdit;
use App\Mail\Veranstaltungen\VeranstaltungenMail;
use App\Models\Frontend\Veranstaltungen\Veranstaltungen;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class VeranstaltungenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $veranstaltungens = Veranstaltungen::where('datum_bis', '>=', now())->orderBy('datum_von', 'ASC')->paginate(12);

        return view('frontend.veranstaltungen.index', compact('veranstaltungens', $veranstaltungens));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('frontend.veranstaltungen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'datum_von' => 'required|max:16',
            'datum_bis' => 'required|max:16',
            'veranstaltung' => 'max:255',
            'veranstaltungsort' => 'max:255',
            'veranstalter' => 'max:255',
            'beschreibung' => 'required|min:50|max:100000',
            'social_fb' => 'max:255',
            'social_ig' => 'max:255',
            'social_tw' => 'max:255',
            'webseite' => 'max:255',
            'eintritt' => 'max:255',
        ]);

        $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", "´", " ", "_");
        $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue", "ss", "", "-", "-");

        $title = $request->veranstaltung;
        $name = strtolower(str_replace($search, $replace, $request->veranstaltung));
        $slug = SlugService::createSlug(Veranstaltungen::class, 'slug', $name);
        $von = Carbon::parse($request->datum_von)->toDateTimeString();
        $bis = Carbon::parse($request->datum_bis)->toDateTimeString();

        $veranstaltungen = new Veranstaltungen();
        $veranstaltungen->datum_von = $von;
        $veranstaltungen->datum_bis = $bis;
        $veranstaltungen->veranstaltung = $request->veranstaltung;
        $veranstaltungen->veranstaltungsort = $request->veranstaltungsort;
        $veranstaltungen->veranstalter = $request->veranstalter;
        $veranstaltungen->webseite = $request->webseite;
        $veranstaltungen->social_fb = $request->facebook;
        $veranstaltungen->social_ig = $request->instagram;
        $veranstaltungen->social_tw = $request->twitter;
        $veranstaltungen->beschreibung = $request->beschreibung;
        $veranstaltungen->eintritt = $request->eintritt;
        $veranstaltungen->published = 0;
        $veranstaltungen->title = $title;
        $veranstaltungen->name = $name;
        $veranstaltungen->slug = $slug;
        $veranstaltungen->save();

        Mail::to('info@thueringer-tuning-freunde.de')->send(new VeranstaltungenMail($veranstaltungen));
        toastr()->info('Deine Veranstaltung wurde gespeichert und wird nun durch einen Admin freigeschaltet!');
        return redirect()->route('frontend.veranstaltungen.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Veranstaltungen $veranstaltungen
     * @return Application|Factory|View
     */
    public function show(Veranstaltungen $veranstaltungen)
    {
        return view('frontend.veranstaltungen.show', compact('veranstaltungen', $veranstaltungen));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Veranstaltungen $veranstaltungen
     * @return Application|Factory|View
     */
    public function edit(Veranstaltungen $veranstaltungen)
    {
        return view('frontend.veranstaltungen.edit', compact('veranstaltungen', $veranstaltungen));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Veranstaltungen $veranstaltungen
     * @return RedirectResponse
     */
    public function update(Request $request, Veranstaltungen $veranstaltungen)
    {
        $this->validate($request, [
            'datum_von' => 'required|max:16',
            'datum_bis' => 'required|max:16',
            'veranstaltung' => 'max:255',
            'veranstaltungsort' => 'max:255',
            'veranstalter' => 'max:255',
            'beschreibung' => 'required|min:50|max:100000',
            'social_fb' => 'max:255',
            'social_ig' => 'max:255',
            'social_tw' => 'max:255',
            'webseite' => 'max:255',
            'eintritt' => 'max:255',
        ]);

        $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", "´", " ", "_");
        $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue", "ss", "", "-", "-");

        $title = $request->veranstaltung;
        $name = strtolower(str_replace($search, $replace, $request->veranstaltung));
        if ($request->veranstaltung == $veranstaltungen->title) {
            $slug = $veranstaltungen->slug;
        } else {
            $slug = SlugService::createSlug(Veranstaltungen::class, 'slug', $name);
        }
        $von = Carbon::parse($request->datum_von)->toDateTimeString();
        $bis = Carbon::parse($request->datum_bis)->toDateTimeString();
        $published_at = $veranstaltungen->published_at;

        $veranstaltungen->datum_von = $von;
        $veranstaltungen->datum_bis = $bis;
        $veranstaltungen->veranstaltung = $request->veranstaltung;
        $veranstaltungen->veranstaltungsort = $request->veranstaltungsort;
        $veranstaltungen->veranstalter = $request->veranstalter;
        $veranstaltungen->webseite = $request->webseite;
        $veranstaltungen->social_fb = $request->facebook;
        $veranstaltungen->social_ig = $request->instagram;
        $veranstaltungen->social_tw = $request->twitter;
        $veranstaltungen->beschreibung = $request->beschreibung;
        $veranstaltungen->eintritt = $request->eintritt;
        $veranstaltungen->published_at = $published_at;
        $veranstaltungen->title = $title;
        $veranstaltungen->name = $name;
        $veranstaltungen->slug = $slug;

        if (!Auth::user()) {
            $veranstaltungen->published = 0;
            $veranstaltungen->save();
            Mail::to('info@thueringer-tuning-freunde.de')->send(new VeranstaltungenEdit($veranstaltungen));
            toastr()->info('Deine Veranstaltung wurde geändert und durch eine Admin erneut geprüft!');
            return redirect()->route('frontend.veranstaltungen.index');
        } else {
            $veranstaltungen->published = 1;
            $veranstaltungen->save();
            toastr()->info('Deine Veranstaltung wurde geändert!');
            return redirect()->route('frontend.veranstaltungen.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Veranstaltungen $veranstaltungen
     * @return RedirectResponse
     */
    public function published(Request $request, Veranstaltungen $veranstaltungen)
    {
//        dd($request->all());
        DB::table('veranstaltungens')->where('slug', '=', $request->slug)->update(['published' => $request->published, 'published_at' => now(),]);

        toastr()->success('Veranstaltung wurde Freigegeben!');
        return redirect()->route('frontend.veranstaltungen.show', $request->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Veranstaltungen $veranstaltungen
     * @return RedirectResponse
     */
    public function destroy(Veranstaltungen $veranstaltungen)
    {
        $veranstaltungen->delete();

        toastr()->error('Veranstaltung wurde gelöscht!');
        return redirect()->route('frontend.veranstaltungen.index');
    }
}
