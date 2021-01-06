<?php

namespace App\Http\Controllers\Intern\Antrag;

use App\Http\Controllers\Controller;
use App\Mail\Antrag\AntragEntfernt;
use App\Models\Frontend\Album\Photos;
use App\Models\Frontend\Fahrzeuge\Fahrzeuge;
use App\Models\Frontend\Team\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AntragRevokeController extends Controller
{
    public function revoke(Request $request, $id)
    {
        $antrag = Team::findOrFail($id);
        $antrag->fahrzeuge = Fahrzeuge::where('antrag_id', '=', $id)->first();
        $album_id = $antrag->fahrzeuge->album_id;
        $antrag->photos = Photos::where('album_id', '=', $album_id)->get();

        DB::table('teams')->where('antrag_id', '=', $request->antrag_id)
            ->update([
                'aktiv' => $request->is_checked,
                'name' => NULL,
                'title' => NULL,
                'slug' => NULL,
                'updated_at' => now(),
                'published_at' => NULL,
            ]);
        DB::table('fahrzeuges')->where('antrag_id', '=', $request->antrag_id)
            ->update([
                'published' => $request->is_checked,
                'user_id' => NULL,
                'updated_at' => now(),
                'published_at' => NULL,
            ]);
        DB::table('subnavigations')
            ->where('slug', '=', $request->slugTeam)
            ->orWhere('slug', '=', $request->slugFZ)
            ->delete();
        DB::table('albums')->where('id', '=', $request->album_id)
            ->update([
                'published' => $request->is_checked,
                'user_id' => NULL,
                'updated_at' => now(),
                'published_at' => NULL,
            ]);
        DB::table('photos')->where('album_id', '=', $request->album_id)
            ->update([
                'published' => $request->is_checked,
                'user_id' => NULL,
                'updated_at' => now(),
                'published_at' => NULL,
            ]);
        DB::table('users')->where('id', '=', $antrag->user_id)->delete();

        Mail::to('club@thueringer-tuning-freunde.de')->send(new AntragEntfernt($antrag));
        toastr()->success('Antrag wurde zurückgezogen');
        return redirect()->route('intern.antrag.index');
    }
}
