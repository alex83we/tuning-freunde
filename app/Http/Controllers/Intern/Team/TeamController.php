<?php

namespace App\Http\Controllers\Intern\Team;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Album\Album;
use App\Models\Frontend\Fahrzeuge\Fahrzeuge;
use App\Models\Frontend\Team\Team;
use App\Models\Intern\Miete\Miete;
use App\Models\Intern\Miete\MieteMitglied;
use DateTime;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|void
     */
    public function index()
    {
        $teams = Team::with('fahrzeuges')->with('miete_mitgliedsbeitrag')->get();
        $albums = Album::with('photos')->get();
        /*$miete = false;
        foreach ($team->miete_mitgliedsbeitrag as $miete) {
            $miete;
        }*/

        return view('intern.team.index', compact('teams', $teams, 'albums', $albums));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $search = (["_", ".", ",", "€", " "]);
        $replace = ([""]);
        $betrag = str_replace($search, $replace, $request->betrag);

        $miete = new MieteMitglied();
        $miete->team_id = $request->team_id;
        $miete->type = $request->type;
        $miete->betrag = number_format($betrag, 2);
        $miete->save();

        toastr()->success('gespeichert');
        return redirect()->route('intern.team.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Team $team
     * @return Application|Factory|View|void
     */
    public function show(Team $team)
    {
        $team->fahrzeuges = Fahrzeuge::where('user_id', '=', $team->user_id)->get();
        $team->galerie = Album::with('photos')->where('user_id', '=', $team->user_id)->get();

        date_default_timezone_set("Europe/Berlin");
        $geburtsdatum = $team->geburtsdatum;
        $datum1 = new DateTime($geburtsdatum);
        $datum2 = new DateTime(date('d').'-'.date('m').'-'.date('Y'));
        $interval = $datum2->diff($datum1);
        $geburtsdatum = ($interval->format('%Y Jahre'));
        $team->gebdatum = $geburtsdatum;

        return view('intern.team.show', compact('team', $team));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Team $team
     * @return void
     */
    public function edit(Team $team)
    {
        $team = Team::with('miete_mitgliedsbeitrag')->where('id', '=', $team->id)->first();
        $miete = false;
        foreach ($team->miete_mitgliedsbeitrag as $miete) {
            $miete;
        }
        return view('intern.team.edit', compact('team', 'miete'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Team $team
     * @return void
     */
    public function update(Request $request, Team $team)
    {
        $search = (["_", ".", ",", "€", " "]);
        $replace = ([""]);
        $betrag = str_replace($search, $replace, $request->betrag);
        $id = $team->id;

        $miete = MieteMitglied::find($request->id);
        $miete->type = $request->type;
        $miete->betrag = number_format($betrag, 2);
        $miete->updated_at = now();
        $miete->save();

        toastr()->success('geändert');
        return redirect()->route('intern.team.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Team $team
     * @return void
     */
    public function destroy(Team $team)
    {
        //
    }
}
