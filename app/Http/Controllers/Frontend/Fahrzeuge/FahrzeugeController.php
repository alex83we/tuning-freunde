<?php

namespace App\Http\Controllers\Frontend\Fahrzeuge;

use App\Http\Controllers\Controller;
use App\Mail\Fahrzeug\FahrzeugHinzugefuegt;
use App\Models\Frontend\Album\Album;
use App\Models\Frontend\Album\Photos;
use App\Models\Frontend\Fahrzeuge\Fahrzeuge;
use App\Models\Frontend\Team\Team;
use App\Models\Helpers\SomeClass;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;
use function GuzzleHttp\Promise\all;

class FahrzeugeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:fahrzeug-list|fahrzeug-create|fahrzeug-edit|fahrzeug-destroy', ['only' => 'store']);
        $this->middleware('permission:fahrzeug-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:fahrzeug-edit', ['only' => ['edit', 'update', 'published']]);
        $this->middleware('permission:fahrzeug-destroy', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $fahrzeuges = Fahrzeuge::where('published', '=', true)->orderBy('updated_at', 'DESC')->paginate(12);

        return view('frontend.fahrzeuge.index', compact('fahrzeuges', $fahrzeuges));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('frontend.fahrzeuge.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fahrzeug' => 'required|max:255',
            'baujahr' => 'required|max:4',
            'motor' => 'required|max:255',
            'besonderheiten' => 'max:255',
            'karosserie' => 'max:60000',
            'felgen' => 'max:60000',
            'fahrwerk' => 'max:60000',
            'bremsen' => 'max:60000',
            'innenraum' => 'max:60000',
            'anlage' => 'max:60000',
            'description' => 'max:600000',
            'kategorie' => 'required',
        ]);

        $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", "´", " ", "_");
        $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue", "ss", "", "-", "-");

        $title = $request->fahrzeug;
        $name = strtolower(str_replace($search, $replace, $request->fahrzeug));
        $slugFZ = SlugService::createSlug(Album::class, 'slug', $name);
        $published_at = Carbon::parse(now())->toDateTimeLocalString();
        $description = $request->description;

        if ($request->besonderheiten == true) { $besonderheiten = $request->besonderheiten; } else { $besonderheiten = 'Keine'; }
        if ($request->karosserie == true) { $karosserie = $request->karosserie; } else { $karosserie = 'Original'; }
        if ($request->fahrwerk == true) { $fahrwerk = $request->fahrwerk; } else { $fahrwerk = 'Original'; }
        if ($request->felgen == true) { $felgen = $request->felgen; } else { $felgen = 'Original'; }
        if ($request->bremsen == true) { $bremsen = $request->bremsen; } else { $bremsen = 'Original'; }
        if ($request->innenraum == true) { $innenraum = $request->innenraum; } else { $innenraum = 'Original'; }
        if ($request->anlage == true) { $anlage = $request->anlage; } else { $anlage = 'Original'; }

        $images = $request->hasFile('images');
        if (!empty($images))
        {
            foreach ($request->file('images') as $images) {
                $imageName = $images->getClientOriginalName();
                $nameToString = str_replace(' ', '_', $imageName);

                if (!Storage::disk('public')->exists('images/' . $slugFZ)) {
                    Storage::disk('public')->makeDirectory('images/' . $slugFZ);
                }

                if (!Storage::disk('public')->exists('images/' . $slugFZ . '/thumbnails')) {
                    Storage::disk('public')->makeDirectory('images/' . $slugFZ . '/thumbnails');
                }

                $watermark = public_path('images/watermark.png');
                $watermarkBig = public_path('images/watermarkBig.png');
                // Thumbnails
                $albumImages = Image::make($images)->fit(350)->insert($watermark, 'bottom-right', 10, 10)->stream();
                Storage::disk('public')->put('images/' . $slugFZ . '/thumbnails/' . $nameToString, $albumImages);
                // Images
                $photoImages = Image::make($images)->resize(1920, 1080, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->insert($watermark, 'bottom-right', 10, 10)->stream();
                Storage::disk('public')->put('images/' . $slugFZ . '/' . $nameToString, $photoImages);
                $data[] = $nameToString;
                $size[] = SomeClass::bytesToHuman($images->getSize());
            }
        } else {
            $data = "default.png";
            $size = SomeClass::bytesToHuman(25570);
        }

        $album = new Album();
        $album->title = $title;
        $album->user_id = auth()->user()->id;
        $album->name = $name;
        $album->slug = $slugFZ;
        $album->kategorie = $request->kategorie;
        if (!empty($images)) {
            $album->size = $size[0];
            $album->images = $data[0];
        } else {
            $album->size = $size;
            $album->images = $data;
        }
        $album->description = Str::limit(strip_tags($request->description), 200);
        $album->published = 0;
        $album->published_at = NULL;
        $album->save();

        if ($request->images == true) {
            if (count($request->images) > 0) {
                foreach ($request->images as $item => $v) {
                    $fotos = array(
                        'album_id' => $album->id,
                        'user_id' => auth()->user()->id,
                        'title' => $title,
                        'name' => $name,
                        'slug' => $slugFZ,
                        'size' => $size[$item],
                        'images' => $data[$item],
                        'description' => Str::limit(strip_tags($request->description), 200),
                        'published' => 0,
                        'published_at' => NULL,
                        'updated_at' => now(),
                        'created_at' => now(),
                    );
                    Photos::insert($fotos);
                }
            }
        } else {
            $fotos = array(
                'album_id' => $album->id,
                'user_id' => auth()->user()->id,
                'title' => $title,
                'name' => $name,
                'slug' => $slugFZ,
                'size' => $size,
                'images' => $data,
                'description' => Str::limit(strip_tags($request->description), 200),
                'published' => 0,
                'published_at' => NULL,
                'updated_at' => now(),
                'created_at' => now(),
            );
            Photos::insert($fotos);
        }

        $fahrzeuge = new Fahrzeuge();
        $fahrzeuge->title = $title;
        $fahrzeuge->album_id = $album->id;
        $fahrzeuge->user_id = auth()->user()->id;
        $fahrzeuge->name = $name;
        $fahrzeuge->slug = $slugFZ;
        $fahrzeuge->fahrzeug = $request->fahrzeug;
        $fahrzeuge->baujahr = $request->baujahr;
        $fahrzeuge->besonderheiten = $besonderheiten;
        $fahrzeuge->motor = $request->motor;
        $fahrzeuge->karosserie = $karosserie;
        $fahrzeuge->felgen = $felgen;
        $fahrzeuge->fahrwerk = $fahrwerk;
        $fahrzeuge->bremsen = $bremsen;
        $fahrzeuge->innenraum = $innenraum;
        $fahrzeuge->anlage = $anlage;
        if (!empty($images)) {
            $fahrzeuge->images = $data[0];
        } else {
            $fahrzeuge->images = $data;
        }
        $fahrzeuge->description = $request->description;
        $fahrzeuge->published = 0;
        $fahrzeuge->published_at = NULL;
        $fahrzeuge->save();

        Mail::to('info@thueringer-tuning-freunde.de')->send(new FahrzeugHinzugefuegt($fahrzeuge));
        toastr()->success('Dein Fahrzeug wurde angelegt und wird durch einen Admin geprüft!');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param Fahrzeuge $fahrzeuge
     * @return Application|Factory|View
     */
    public function show(Fahrzeuge $fahrzeuge)
    {
        $albums = DB::table('albums')
            ->join('photos', 'photos.album_id', '=', 'albums.id')
            ->where('albums.id', '=', $fahrzeuge->album_id)
            ->inRandomOrder()
            ->take(10)
            ->get();
        $team = DB::table('teams')->where('user_id', '=', $fahrzeuge->user_id)->get();

        $previous = Fahrzeuge::where('id', '<', $fahrzeuge->id)->where('published', '=', true)->orderBy('id', 'DESC')->first();
        $next = Fahrzeuge::where('id', '>', $fahrzeuge->id)->where('published', '=', true)->orderBy('id')->first();

        return view('frontend.fahrzeuge.show', compact('fahrzeuge', $fahrzeuge, 'albums', $albums, 'team',
            $team, 'previous', $previous, 'next', $next));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Fahrzeuge $fahrzeuge
     * @return Application|Factory|View
     */
    public function edit(Fahrzeuge $fahrzeuge)
    {
        return view('frontend.fahrzeuge.edit', compact('fahrzeuge', $fahrzeuge));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Fahrzeuge $fahrzeuge
     * @return RedirectResponse
     */
    public function update(Request $request, Fahrzeuge $fahrzeuge)
    {
        $this->validate($request, [
            'fahrzeug' => 'required|max:255',
            'baujahr' => 'required|max:4',
            'motor' => 'required|max:255',
            'besonderheiten' => 'max:255',
            'karosserie' => 'max:60000',
            'felgen' => 'max:60000',
            'fahrwerk' => 'max:60000',
            'bremsen' => 'max:60000',
            'innenraum' => 'max:60000',
            'anlage' => 'max:60000',
            'description' => 'max:600000',
        ]);

        if ($request->besonderheiten == true) { $besonderheiten = $request->besonderheiten; } else { $besonderheiten = 'Keine'; }
        if ($request->karosserie == true) { $karosserie = $request->karosserie; } else { $karosserie = 'Original'; }
        if ($request->fahrwerk == true) { $fahrwerk = $request->fahrwerk; } else { $fahrwerk = 'Original'; }
        if ($request->felgen == true) { $felgen = $request->felgen; } else { $felgen = 'Original'; }
        if ($request->bremsen == true) { $bremsen = $request->bremsen; } else { $bremsen = 'Original'; }
        if ($request->innenraum == true) { $innenraum = $request->innenraum; } else { $innenraum = 'Original'; }
        if ($request->anlage == true) { $anlage = $request->anlage; } else { $anlage = 'Original'; }

        $fahrzeuge->fahrzeug = $request->fahrzeug;
        $fahrzeuge->baujahr = $request->baujahr;
        $fahrzeuge->besonderheiten = $besonderheiten;
        $fahrzeuge->motor = $request->motor;
        $fahrzeuge->karosserie = $karosserie;
        $fahrzeuge->felgen = $felgen;
        $fahrzeuge->fahrwerk = $fahrwerk;
        $fahrzeuge->bremsen = $bremsen;
        $fahrzeuge->innenraum = $innenraum;
        $fahrzeuge->anlage = $anlage;
        $fahrzeuge->description = $request->description;
        $fahrzeuge->save();

        toastr()->success('Fahrzeugdaten wurden geändert!');
        return redirect()->route('frontend.fahrzeuge.show', $fahrzeuge->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Fahrzeuge $fahrzeuge
     * @return RedirectResponse
     */
    public function destroy(Request $request, Fahrzeuge $fahrzeuge)
    {
        $id = $request->id;
        $slug = $request->slug;

        if (Storage::disk('public')->exists('images/'.$fahrzeuge->slug)) {
            Storage::disk('public')->deleteDirectory('images/'.$fahrzeuge->slug);
        }
        DB::table('subnavigations')->where('slug', '=', $slug)->delete();
        DB::table('photos')->where('slug', '=', $slug)->delete();
        DB::table('albums')->where('slug', '=', $slug)->delete();
        $fahrzeuge->delete();

        toastr()->success('Fahrzeug wurde endgültig gelöscht!');
        return redirect()->route('frontend.fahrzeuge.index');

    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function check_slug(Request $request)
    {
        $slug = SlugService::createSlug(Fahrzeuge::class, 'slug', $request->fahrzeug);
        return response()->json(['slug' => $slug]);
    }

    /**
     * @param Request $request
     * @param Fahrzeuge $fahrzeuge
     * @return Application|RedirectResponse|Redirector
     */
    public function unpublished(Request $request, Fahrzeuge $fahrzeuge)
    {
        $fahrzeuge->published = $request->published;
        DB::table('subnavigations')->where('slug', '=', $fahrzeuge->slug)->update(['published' => $request->published]);
        DB::table('albums')->where('slug', '=', $fahrzeuge->slug)->update(['published' => $request->published]);
        DB::table('photos')->where('slug', '=', $fahrzeuge->slug)->update(['published' => $request->published]);
        $fahrzeuge->save();

        toastr()->success('Fahrzeug wurde deaktiviert!');
        return redirect()->route('frontend.fahrzeuge.index');
    }

    /**
     * @param Request $request
     * @param Fahrzeuge $fahrzeuge
     * @return Application|RedirectResponse|Redirector
     */
    public function published(Request $request, Fahrzeuge $fahrzeuge)
    {
        $fahrzeuge->published = $request->published;
        DB::table('subnavigations')->where('slug', '=', $fahrzeuge->slug)->update(['published' => $request->published]);
        DB::table('albums')->where('slug', '=', $fahrzeuge->slug)->update(['published' => $request->published]);
        DB::table('photos')->where('slug', '=', $fahrzeuge->slug)->update(['published' => $request->published]);
        $fahrzeuge->save();

        toastr()->success('Fahrzeug wurde veröffentlicht!');
        return redirect()->route('frontend.fahrzeuge.show', $fahrzeuge->slug);
    }
}
