<?php

namespace App\Http\Controllers\Intern\Miete;

use App\Http\Controllers\Controller;
use App\Models\Intern\Miete\Miete;
use Illuminate\Support\Facades\DB;

class MieteChartController extends Controller
{
    public function index()
    {
        $records = DB::table('mietes')
            ->select(DB::raw("sum(summe) as summe"), "verwendungszweck as verwendung", \DB::raw("YEAR(zahlungsdatum) as year"))
            ->groupBy('verwendung', 'summe', 'year')
            ->orderBy('verwendung')
            ->get();

        $data = [];

        foreach ($records as $row) {
            $data['label'][] = $row->verwendung;
            $data['data'][] = $row->summe;
        }
        $data['name_data'] = json_encode($data);
        return view('intern.miete.chart-miete', $data, compact('records'));
    }
}
