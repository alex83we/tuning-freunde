<?php

namespace App\Http\Controllers\Intern\Geburtstagsliste;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Team\Team;

class GeburtstagslisteController extends Controller
{
    public function index()
    {
        $teams = Team::where('aktiv', '=', true)->get();

        return view('intern.geburtstagsliste.index', compact('teams', $teams));
    }
}
