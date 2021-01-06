<?php

namespace App\Http\Controllers\Frontend\Ueberuns;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Album\Album;
use App\Models\Frontend\Fahrzeuge\Fahrzeuge;
use App\Models\Frontend\Team\Team;
use Illuminate\Http\Request;

class UeberUnsController extends Controller
{
    public function index()
    {
        $team = Team::where('aktiv', '=', true)->count();
        $fahrzeuge = Fahrzeuge::where('published', '=', true)->count();
        $project = Album::where('published', '=', true)->where('kategorie', '=', 'Projekte')->count();

        return view('frontend.ueber-uns.index', compact('team', $team, 'fahrzeuge', $fahrzeuge, 'project', $project));
    }
}
