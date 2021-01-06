<?php

namespace App\Http\Controllers\Intern;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Team\Team;
use App\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        $teams = Team::with('fahrzeuges')->where('aktiv', '=', true)->take(6)->get();
        $teamsAll = Team::with('fahrzeuges')->where('aktiv', '=', true)->orderBy('geburtsdatum', 'ASC')->get();
        $mitglieder = Team::with('fahrzeuges')->where('aktiv', '=', true)->latest()->take(6)->get();
        $logins = DB::table('users')
            ->join('login_histories', 'login_histories.user_id', '=', 'users.id')
            ->orderBy('login_histories.id', 'DESC')
            ->take(6)
            ->get();

        return view('intern.dashboard', compact('users', $users, 'teams', $teams, 'logins', $logins, 'mitglieder', $mitglieder, 'teamsAll', $teamsAll));
    }
}
