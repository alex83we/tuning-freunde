<?php

namespace App\Http\Controllers\Intern\Miete;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Team\Team;
use App\Models\Intern\Miete\Zahlung;
use Illuminate\Http\Request;

class ZahlungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::with('miete_mitgliedsbeitrag')->with('zahlung')->orderBy('vorname', 'ASC')->get();
        $zahlung = Zahlung::selectRaw("id, team_id, type, last_paid, paid, betrag, month_year, date_format(created_at, '%M') month")
            ->get()
            ->sortBy('month');
        return view('intern.miete.zahlung.index', compact('team', 'zahlung'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $zahlung = new Zahlung();
        $zahlung->team_id = $request->id;
        $zahlung->type = $request->type;
        if (!empty($request->last_paid)) {
            $zahlung->last_paid = $request->last_paid;
        } else {
            $zahlung->last_paid = now();
        }
        $zahlung->paid = now();
        $zahlung->betrag = $request->betrag;
        $zahlung->month_year = $request->month.'.'.date('Y');
        $zahlung->save();

        toastr()->success('BEZAHLT!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Zahlung $zahlung
     * @return \Illuminate\Http\Response
     */
    public function show(Zahlung $zahlung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Zahlung $zahlung
     * @return \Illuminate\Http\Response
     */
    public function edit(Zahlung $zahlung)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Zahlung $zahlung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zahlung $zahlung)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Zahlung $zahlung
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zahlung $zahlung)
    {
        //
    }
}