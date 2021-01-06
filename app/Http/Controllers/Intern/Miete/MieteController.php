<?php

namespace App\Http\Controllers\Intern\Miete;

use App\Charts\MieteChart;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Team\Team;
use App\Models\Intern\Miete\Miete;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MieteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|void
     */
    public function index()
    {
        $teams = Team::all();

        $mieten = Miete::orderBy('zahlungsdatum', 'DESC')->get()->groupBy(function ($d) {
            return Carbon::parse($d->zahlungsdatum)->isoFormat('MMMM YYYY');
        });

        $getMonth = [];
        foreach (range(1, 12) as $m) {
            $getMonth[] = date('m - F', mktime(0, 0, 0, $m, 1));
        }

        $record = Miete::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(zahlungsdatum) as month_name"), \DB::raw("MONTH(zahlungsdatum) as month"), \DB::raw("YEAR(zahlungsdatum) as year"))
//            ->where('zahlungsdatum', '=', Carbon::now())
            ->groupBy('month_name', 'month', 'year')
            ->orderBy('month')
            ->get();

        $data = [];

        foreach ($record as $row) {
            $data['label'][] = Carbon::parse($row->month_name)->monthName.' '.$row->year;
            $data['data'][] = (int) $row->count;
        }
        $data['chart_data'] = json_encode($data);

        return view('intern.miete.index', $data, compact('teams', $teams, 'mieten', 'getMonth'));
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
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->name == true) {
            $search = (["_", ".", "€", " "]);
            $replace = ([""]);
            $summe = str_replace($search, $replace, $request->summe);
            $zahlungsdatum = Carbon::parse($request->zahlungsdatum)->toDateTimeString();

            $miete = new Miete();
            $miete->name = $request->name;
            $miete->verwendungszweck = $request->verwendungszweck;
            $miete->summe = $summe;
            $miete->zahlungsdatum = $zahlungsdatum;
            $miete->save();

            toastr()->success('gespeichert');
            return redirect()->back();
        } else {
            return redirect()->back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param Miete $miete
     * @return void
     */
    public function show(Miete $miete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Miete $miete
     * @return void
     */
    public function edit(Miete $miete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Miete $miete
     * @return RedirectResponse|void
     */
    public function update(Request $request, Miete $miete)
    {
        if ($request->name == true) {
            $search = (["_", ".", "€", " "]);
            $replace = ([""]);
            $summe = str_replace($search, $replace, $request->summe);
            $zahlungsdatum = Carbon::parse($request->zahlungsdatum)->toDateTimeString();

            $miete->name = $request->name;
            $miete->verwendungszweck = $request->verwendungszweck;
            $miete->summe = $summe;
//            $miete->zahlungsdatum = $zahlungsdatum;
            $miete->save();

            toastr()->success('gespeichert');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Miete $miete
     * @return void
     */
    public function destroy(Miete $miete)
    {
        //
    }
}
