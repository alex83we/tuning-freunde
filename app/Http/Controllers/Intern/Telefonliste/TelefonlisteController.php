<?php

namespace App\Http\Controllers\Intern\Telefonliste;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Team\Team;
use Illuminate\Http\Request;

class TelefonlisteController extends Controller
{
    public function index()
    {
        $teams = Team::where('aktiv', '=', true)->get();

        return view('intern.telefonliste.index', compact('teams', $teams));
    }
}
