<?php

namespace App\Http\Controllers\Frontend\Antrag;

use App\Http\Controllers\Controller;
use App\Mail\Antrag\AntragEingang;
use App\Mail\Antrag\AntragEingangAdmin;
use App\Models\Frontend\Album\Album;
use App\Models\Frontend\Album\Photos;
use App\Models\Frontend\Fahrzeuge\Fahrzeuge;
use App\Models\Frontend\Team\Team;
use App\Models\Helpers\SomeClass;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use DateTime;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class AntragController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        return view('frontend.antrag.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        if ($request->fahrzeugvorhanden == false) {
            $this->validate($request, [
                'anrede' => 'required',
                'vorname' => 'required|max:255',
                'nachname' => 'required|max:255',
                'straße' => 'required|max:255',
                'plz' => 'required|max:5',
                'ort' => 'required|max:255',
                'email' => 'required|max:255|email',
                'geburtsdatum' => 'required|max:255',
                'fahrzeug' => 'required|max:255',
                'baujahr' => 'required|max:4',
                'mobil' => 'required|max:15',
                'telefon' => 'max:15',
                'motor' => 'required|max:65535',
                'besonderheiten' => 'max:65535',
                'karosserie' => 'max:65535',
                'felgen' => 'max:65535',
                'bremsen' => 'max:65535',
                'innenraum' => 'max:65535',
                'anlage' => 'max:65535',
                'beruf' => 'max:65535',
                'facebook' => 'max:255',
                'twitter' => 'max:255',
                'instagram' => 'max:255',
                'beschreibung' => 'min:250|max:4294967295',
                'beschreibungFz' => 'min:50|max:4294967295',
            ]);
        } else {
            $this->validate($request, [
                'anrede' => 'required',
                'vorname' => 'required|max:255',
                'nachname' => 'required|max:255',
                'straße' => 'required|max:255',
                'plz' => 'required|max:5',
                'ort' => 'required|max:255',
                'email' => 'required|max:255|email',
                'geburtsdatum' => 'required|max:255',
//                'fahrzeug' => 'required|max:255',
//                'baujahr' => 'required|max:4',
                'mobil' => 'required|max:15',
                'telefon' => 'max:15',
//                'motor' => 'required|max:65535',
//                'besonderheiten' => 'max:65535',
//                'karosserie' => 'max:65535',
//                'felgen' => 'max:65535',
//                'bremsen' => 'max:65535',
//                'innenraum' => 'max:65535',
//                'anlage' => 'max:65535',
                'beruf' => 'max:65535',
                'facebook' => 'max:255',
                'twitter' => 'max:255',
                'instagram' => 'max:255',
                'beschreibung' => 'min:250|max:4294967295',
//                'beschreibungFz' => 'min:50|max:4294967295',
            ]);
        }

        if ($request->anrede == false) { $anrede = 'keine Angabe'; } else { $anrede = $request->anrede; }

        if ($request->fahrzeugvorhanden == false) {
        $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", "´", " ", "_");
        $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue", "ss", "", "-", "-");

        $title = $request->fahrzeug;
        $name = strtolower(str_replace($search, $replace, $request->fahrzeug));
//        $slug = $request->slug;
        $slug = SlugService::createSlug(Fahrzeuge::class, 'slug', $title);
        $published_at = Carbon::parse(now())->toDateTimeLocalString();

        if ($request->besonderheiten == true) { $besonderheiten = $request->besonderheiten; } else { $besonderheiten = 'Keine'; }
        if ($request->karosserie == true) { $karosserie = $request->karosserie; } else { $karosserie = 'Original'; }
        if ($request->fahrwerk == true) { $fahrwerk = $request->fahrwerk; } else { $fahrwerk = 'Original'; }
        if ($request->felgen == true) { $felgen = $request->felgen; } else { $felgen = 'Original'; }
        if ($request->bremsen == true) { $bremsen = $request->bremsen; } else { $bremsen = 'Original'; }
        if ($request->innenraum == true) { $innenraum = $request->innenraum; } else { $innenraum = 'Original'; }
        if ($request->anlage == true) { $anlage = $request->anlage; } else { $anlage = 'Original'; }
        if ($request->beruf == true) { $beruf = $request->beruf; } else { $beruf = 'Keinen'; }

        $images = $request->hasFile('images');
        if (!empty($images))
        {
            foreach ($request->file('images') as $images) {
                $imageName = $images->getClientOriginalName();
                $nameToString = str_replace(' ', '_', $imageName);

                if (!Storage::disk('public')->exists('images/' . $slug)) {
                    Storage::disk('public')->makeDirectory('images/' . $slug);
                }

                if (!Storage::disk('public')->exists('images/' . $slug . '/thumbnails')) {
                    Storage::disk('public')->makeDirectory('images/' . $slug . '/thumbnails');
                }

                $watermark = public_path('images/watermark.png');
                $watermarkBig = public_path('images/watermarkBig.png');
                // Thumbnails
                $albumImages = Image::make($images)->fit(350)->insert($watermark, 'bottom-right', 10, 10)->stream();
                Storage::disk('public')->put('images/' . $slug . '/thumbnails/' . $nameToString, $albumImages);
                // Images
                $photoImages = Image::make($images)->resize(1920, 1080, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->insert($watermark, 'bottom-right', 10, 10)->stream();
                Storage::disk('public')->put('images/' . $slug . '/' . $nameToString, $photoImages);

                $data[] = $nameToString;
                $size[] = SomeClass::bytesToHuman($images->getSize());
            }
        } else {
            $data = "default.png";
            $size = SomeClass::bytesToHuman(25570);
        }
            $album = new Album();
            $album->title = $title;
            $album->name = $name;
            $album->slug = $slug;
            $album->kategorie = 'Fahrzeuge';
            $album->size = $size[0];
            $album->images = $data[0];
            $album->description = $title;
            $album->published = 0;
            $album->save();

            if ($request->images == true) {
                if (count($request->images) > 0) {
                    foreach ($request->images as $item => $v) {
                        $fotos = array(
                            'album_id' => $album->id,
                            'title' => $title,
                            'name' => $name,
                            'slug' => $slug,
                            'size' => $size[$item],
                            'images' => $data[$item],
                            'description' => $title,
                            'published' => 0,
                            'updated_at' => now(),
                            'created_at' => now(),
                        );
                        Photos::insert($fotos);
                    }
                }
            } else {
                $fotos = array(
                    'album_id' => $album->id,
                    'title' => $title,
                    'name' => $name,
                    'slug' => $slug,
                    'size' => $size[0],
                    'images' => $data[0],
                    'description' => $title,
                    'published' => 0,
                    'updated_at' => now(),
                    'created_at' => now(),
                );
                Photos::insert($fotos);
            }

            $fahrzeuge = new Fahrzeuge();
            $fahrzeuge->title = $title;
            $fahrzeuge->album_id = $album->id;
            $fahrzeuge->name = $name;
            $fahrzeuge->slug = $slug;
            $fahrzeuge->fahrzeug = $request->fahrzeug;
            $fahrzeuge->baujahr = $request->baujahr;
            $fahrzeuge->besonderheiten = $besonderheiten;
            $fahrzeuge->motor = $request->motor;
            $fahrzeuge->karosserie = $karosserie;
            $fahrzeuge->felgen = $felgen;
            $fahrzeuge->fahrwerk = $fahrwerk;
            $fahrzeuge->bremsen = $bremsen;
            $fahrzeuge->innenraum = $innenraum;
            $fahrzeuge->anlage = $anlage;
            $fahrzeuge->images = $data[0];
            $fahrzeuge->description = $request->beschreibungFz;
            $fahrzeuge->published = 0;
            $fahrzeuge->save();

            $profilImg = $request->file('profilImg');
            if (isset($profilImg)) {
                $imageProfil = $request->vorname . '-' . $request->nachname . '-' . $profilImg->getClientOriginalName();

                if (!Storage::disk('public')->exists('images/profil')) {
                    Storage::disk('public')->makeDirectory('images/profil');
                }

                $profilImage = Image::make($profilImg)->resize(1280, 720, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->stream();
                Storage::disk('public')->put('images/profil/' . $imageProfil, $profilImage);
            } else {
                $imageProfil = NULL;
            }

            $team = new Team();
            $team->fahrzeug_id = $fahrzeuge->id;
            $team->fahrzeugvorhanden = 0;
            $team->anrede = $anrede;
            $team->vorname = $request->vorname;
            $team->nachname = $request->nachname;
            $team->straße = $request->straße;
            $team->plz = $request->plz;
            $team->wohnort = $request->ort;
            $team->telefon = $request->telefon;
            $team->mobil = $request->mobil;
            $team->email = $request->email;
            $team->geburtsdatum = $request->geburtsdatum;
            $team->beruf = $beruf;
            $team->facebook = $request->facebook;
            $team->twitter = $request->twitter;
            $team->instagram = $request->instagram;
            $team->description = $request->beschreibung;
            $team->image = $imageProfil;
            $team->aktiv = 0;
            $team->ip_adresse = $request->getClientIp();
            $team->save();

            DB::table('teams')->where('id', '=', $team->id)->update(['antrag_id' => $team->id,]);
            DB::table('fahrzeuges')->where('id', '=', $fahrzeuge->id)->update(['antrag_id' => $team->id,]);
            $team->fahrzeuge = Fahrzeuge::where('antrag_id', '=', $team->id)->first();
//            $team->photos = Photos::where('album_id', '=', $album->id)->first();
        } else {
            $profilImg = $request->file('profilImg');
            if ($request->beruf == true) { $beruf = $request->beruf; } else { $beruf = 'Keinen'; }
            if (isset($profilImg)) {
                $imageProfil = $request->vorname . '-' . $request->nachname . '-' . $profilImg->getClientOriginalName();

                if (!Storage::disk('public')->exists('images/profil')) {
                    Storage::disk('public')->makeDirectory('images/profil');
                }

                $profilImage = Image::make($profilImg)->resize(1280, 720, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->stream();
                Storage::disk('public')->put('images/profil/' . $imageProfil, $profilImage);
            } else {
                $imageProfil = NULL;
            }

            $team = new Team();
            $team->fahrzeugvorhanden = 1;
            $team->anrede = $anrede;
            $team->vorname = $request->vorname;
            $team->nachname = $request->nachname;
            $team->straße = $request->straße;
            $team->plz = $request->plz;
            $team->wohnort = $request->ort;
            $team->telefon = $request->telefon;
            $team->mobil = $request->mobil;
            $team->email = $request->email;
            $team->geburtsdatum = $request->geburtsdatum;
            $team->beruf = $beruf;
            $team->facebook = $request->facebook;
            $team->twitter = $request->twitter;
            $team->instagram = $request->instagram;
            $team->description = $request->beschreibung;
            $team->image = $imageProfil;
            $team->aktiv = 0;
            $team->ip_adresse = $request->getClientIp();
            $team->save();

        }

        date_default_timezone_set("Europe/Berlin");
        $geburtsdatum = $team->geburtsdatum;
        $datum1 = new DateTime($geburtsdatum);
        $datum2 = new DateTime(date('d').'-'.date('m').'-'.date('Y'));
        $interval = $datum2->diff($datum1);
        $geburtsdatum = ($interval->format('%Y Jahre'));
        $team->gebdatum = $geburtsdatum;

        Mail::to($request->email)->send(new AntragEingang($team));
        Mail::to('info@thueringer-tuning-freunde.de')->send(new AntragEingangAdmin($team));
        toastr()->success('Dein Antrag wurde erfolgreich versendet.');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
