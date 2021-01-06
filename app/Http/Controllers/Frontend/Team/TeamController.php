<?php

namespace App\Http\Controllers\Frontend\Team;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Fahrzeuge\Fahrzeuge;
use App\Models\Frontend\Navigation\Navigation;
use App\Models\Frontend\Team\Team;
use Cviebrock\EloquentSluggable\Services\SlugService;
use DateTime;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:team-list|team-create|team-edit|team-destroy', ['only' => 'store']);
        $this->middleware('permission:team-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:team-edit', ['only' => ['edit', 'update', 'published']]);
        $this->middleware('permission:team-destroy', ['only' => ['destroy']]);
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $navigation = Navigation::with('subnavigation')->orderBy('navigations.sort', 'ASC')->get();
        $teams = Team::where('aktiv', '=', 1)->orderBy('title', 'ASC')->paginate(21);

        return view('frontend.team.index', compact('navigation', $navigation, 'teams', $teams));
    }

    /**
     *
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param Request $request
     * @param Team $team
     * @return Application|Factory|View
     */
    public function show(Request $request, Team $team)
    {
        $navigation = Navigation::with('subnavigation')->orderBy('navigations.sort', 'ASC')->get();
        $fahrzeuge = Fahrzeuge::where('user_id', '=', $team->user_id)->select('fahrzeug', 'slug')->get();

        date_default_timezone_set("Europe/Berlin");
        $geburtsdatum = $team->geburtsdatum;
        $datum1 = new DateTime($geburtsdatum);
        $datum2 = new DateTime(date('d').'-'.date('m').'-'.date('Y'));
        $interval = $datum2->diff($datum1);
        $geburtsdatum = ($interval->format('%Y Jahre'));
        $team->gebdatum = $geburtsdatum;

        return view('frontend.team.show', compact('navigation', $navigation, 'team', $team, 'fahrzeuge', $fahrzeuge));
    }

    /**
     * @param Team $team
     * @return Application|Factory|View
     */
    public function edit(Team $team)
    {


        return view('frontend.team.edit', compact('team', $team));
    }

    /**
     * @param Request $request
     * @param Team $team
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Team $team)
    {
        $this->validate($request, [
            'anrede' => 'required',
            'vorname' => 'required|max:255',
            'nachname' => 'required|max:255',
            'straße' => 'required|max:255',
            'plz' => 'required|max:5',
            'wohnort' => 'required|max:255',
            'email' => 'required|max:255|email',
            'geburtsdatum' => 'required|max:255',
            'mobil' => 'required|max:15',
            'telefon' => 'max:15',
            'beruf' => 'max:65535',
            'facebook' => 'max:255',
            'twitter' => 'max:255',
            'instagram' => 'max:255',
            'description' => 'required|min:250'
        ]);

        if ($team->images == $request->profilImg) {
            $image = $team->image;
            if (!Storage::disk('public')->exists('images/profil/'.$image)) {
                Storage::disk('public')->makeDirectory('images/profil/'.$image);
            }
        } else {
            $images = $request->file('profilImg');
            if (isset($images)) {
                $imagess =  $request->vorname.'-'.$request->nachname.'-'.$images->getClientOriginalName();
                $image = str_replace(' ', '-', $imagess);

                if (Storage::disk('public')->exists('images/profil/'.$team->image)) {
                    Storage::disk('public')->delete('images/profil/'.$team->image);
                }

                if (!Storage::disk('public')->exists('images/profil')) {
                    Storage::disk('public')->makeDirectory('images/profil');
                }

                $profilImage = Image::make($images)->resize(1280, 720, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->stream();
                Storage::disk('public')->put('images/profil/'.$image, $profilImage);
            }
        }

        $team->anrede = $request->anrede;
        $team->vorname = $request->vorname;
        $team->nachname = $request->nachname;
        $team->straße = $request->straße;
        $team->plz = $request->plz;
        $team->wohnort = $request->wohnort;
        $team->telefon = $request->telefon;
        $team->mobil = $request->mobil;
        $team->email = $request->email;
        $team->geburtsdatum = $request->geburtsdatum;
        $team->beruf = $request->beruf;
        $team->description = $request->description;
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->instagram = $request->instagram;
        $team->image = $image;

        $team->save();

        toastr()->success('Änderungen wurden vorgenommen!');
        return redirect()->route('frontend.team.show', $team->slug);
    }

    /**
     * @param Request $request
     * @param Team $team
     */
    public function destroy(Request $request, Team $team)
    {
        $id = $request->id;
        $slug = $request->slug;

        if (Storage::disk('public')->exists('images/profil/'.$team->image)) {
            Storage::disk('public')->deleteDirectory('images/profil/'.$team->image);
        }
        DB::table('subnavigations')->where('slug', '=', $slug)->delete();
        DB::table('photos')->where('slug', '=', $slug)->delete();
        DB::table('albums')->where('slug', '=', $slug)->delete();
        DB::table('fahrzeuges')->where('slug', '=', $slug)->delete();
        $team->delete();

        toastr()->success('Mitglied wurde gelöscht!');
        return redirect()->route('frontend.team.index');
    }

    public function check_slug(Request $request)
    {
        $slug = SlugService::createSlug(Team::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
