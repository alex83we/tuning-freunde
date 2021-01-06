<?php

namespace App\Http\Controllers\Intern\Hebebuehne;

use App\Http\Controllers\Controller;
use App\Models\Intern\Hebebuehne\Hebebuehne;
use Illuminate\Http\Request;
use Response;

class HebebuehneController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
            $data = Hebebuehne::whereDate('start', '>=', $start)->whereDate('end', '<=', $end)->get(['id', 'title', 'start', 'end']);
            return Response::json($data);
        }
        return view('intern.hebebuehne.index');
    }

    public function create(Request $request)
    {
        $insertArr = [ 'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end
        ];
        $event = Hebebuehne::insert($insertArr);
        return Response::json($event);
    }

    public function update(Request $request)
    {
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
        $event  = Hebebuehne::where($where)->update($updateArr);
        return Response::json($event);
    }

    public function destroy(Request $request)
    {
        $event = Hebebuehne::where('id', $request->id)->delete();
        return Response::json($event);
    }
}
