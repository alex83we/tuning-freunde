<?php

namespace App\Http\Controllers\Intern\Antrag;

use App\Http\Controllers\Controller;
use App\Mail\Antrag\AntragGenehmigt;
use App\Mail\Antrag\AntragGenehmigtClub;
use App\Models\Frontend\Album\Photos;
use App\Models\Frontend\Fahrzeuge\Fahrzeuge;
use App\Models\Frontend\Navigation\SubNavigation;
use App\Models\Frontend\Team\Team;
use App\User;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use DateTime;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AntragCheckedController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $antrags = Team::orderBy('id', 'DESC')->get();

        return view('intern.antrag.index', compact('antrags', $antrags));
    }

    public function show($id)
    {
        /*foreach (auth()->user()->notifications as $notification) {
            $noti = $notification;
        }
        DB::table('notifications')->where('id', '=', $noti->id)->update(['read_at' => now()]);*/

        $antrag = Team::findOrFail($id);
        if ($antrag->fahrzeugvorhanden == false) {
            $antrag->fahrzeuge = Fahrzeuge::where('antrag_id', '=', $id)->first();
            $album_id = $antrag->fahrzeuge->album_id;
            $antrag->photos = Photos::where('album_id', '=', $album_id)->latest()->take(3)->get();
        }

        date_default_timezone_set("Europe/Berlin");
        $geburtsdatum = $antrag->geburtsdatum;
        $datum1 = new DateTime($geburtsdatum);
        $datum2 = new DateTime(date('d').'-'.date('m').'-'.date('Y'));
        $interval = $datum2->diff($datum1);
        $geburtsdatum = ($interval->format('%Y Jahre'));
        $antrag->gebdatum = $geburtsdatum;

        return view('intern.antrag.show', compact('antrag', $antrag));
    }

    /**
     * @param Request $request
     * @param $id
     * @throws ValidationException
     */
    public function checked(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $antrag = Team::findOrFail($id);
        if ($antrag->fahrzeugvorhanden == false) {
            $antrag->fahrzeuge = Fahrzeuge::where('antrag_id', '=', $id)->first();
            $album_id = $antrag->fahrzeuge->album_id;
            $antrag->photos = Photos::where('album_id', '=', $album_id)->get();
        }
        $title = $request->title;
        $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", "´", " ", "_");
        $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue", "ss", "", "-", "-");
        $name = strtolower(str_replace($search, $replace, $request->title));
        $slug = SlugService::createSlug(Team::class, 'slug', $title);
        $is_checked = $request->is_checked;
        $published_at = Carbon::parse($request->published_at)->toDateTimeString();
        $password = Str::random(10);

        $user = User::create([
            'vorname' => $antrag->vorname,
            'nachname' => $antrag->nachname,
            'email' => $antrag->email,
            'password' => Hash::make($password),
            'is_checked' => $is_checked,
        ]);

        $user->assignRole('Mitglied');

        $team = DB::table('teams')->where('id', '=', $antrag->id)
            ->update([
                'aktiv' => $request->is_checked,
                'name' => $name,
                'title' => $title,
                'slug' => $slug,
                'funktion' => $request->funktion,
                'emailIntern' => $request->emailIntern,
                'user_id' => $user->id,
                'updated_at' => now(),
                'published_at' => $published_at
            ]);

        $subnav = new SubNavigation();
        $subnav->navigation_id = 1;
        $subnav->name = $name;
        $subnav->title = $title;
        $subnav->slug = $slug;
        $subnav->published = $request->is_checked;
        $subnav->save();


        if ($antrag->fahrzeugvorhanden == false) {
            $subnav = new SubNavigation();
            $subnav->navigation_id = 2;
            $subnav->name = $request->nameFZ;
            $subnav->title = $request->titleFZ;
            $subnav->slug = $request->slugFZ;
            $subnav->published = $request->is_checked;
            $subnav->save();

            DB::table('albums')
                ->where('id', '=', $request->album_id)
                ->update([
                    'user_id' => $user->id,
                    'published' => $is_checked,
                    'published_at' => $published_at,
                    'updated_at' => now()
                ]);

            DB::table('photos')
                ->where('album_id', '=', $request->album_id)
                ->update([
                    'user_id' => $user->id,
                    'published' => $is_checked,
                    'published_at' => $published_at,
                    'updated_at' => now()
                ]);

            DB::table('fahrzeuges')
                ->where('id', '=', $request->fahrzeug_id)
                ->update([
                    'user_id' => $user->id,
                    'team_id' => $antrag->id,
                    'album_id' => $request->album_id,
                    'published' => $is_checked,
                    'published_at' => $published_at,
                    'updated_at' => now()
                ]);
        }

        Mail::to($antrag->email)->send(new AntragGenehmigt($antrag));
        Mail::to('club@thueringer-tuning-freunde.de')->send(new AntragGenehmigtClub($antrag));

        $expiresAt = now()->addDay();

        $user->sendWelcomeNotification($expiresAt);

        toastr()->success('Antrag wurde genehmigt');
        return redirect()->route('intern.antrag.index');
    }
}
