<?php

namespace App\Http\Controllers\Frontend\Album;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Album\Album;
use App\Models\Frontend\Album\Photos;
use App\Models\Helpers\SomeClass;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class AlbumController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:galerie-list|galerie-create|galerie-edit|galerie-delete', ['only' => 'store']);
        $this->middleware('permission:galerie-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:galerie-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:galerie-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $albums = Album::where('published', '=', true)->orderBy('updated_at', 'DESC')->get();
        $albumcount = Album::where('published', '=', true)->get()->count();
        $kategorie = DB::table('albums')->where('published', '=', true)->select('kategorie')->groupBy('kategorie')->get();
        $photos = Photos::where('published', '=', true)->orderBy('created_at', 'DESC')->get();

        return view('frontend.galerie.index', compact('albums', $albums, 'albumcount', $albumcount, 'kategorie', $kategorie, 'photos', $photos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('frontend.galerie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", "´", " ", "_");
        $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue", "ss", "", "-", "-");

        $this->validate($request, [
            'title' => 'required|max:255',
//            'slug' => 'required|unique:albums',
            'kategorie' => 'required',
            'description' => 'max:255',
        ]);

        $title = $request->title;
        $name = strtolower(str_replace($search, $replace, $request->title));
        $slugAlbum = SlugService::createSlug(Album::class, 'slug', $title);
        $slugPhoto = SlugService::createSlug(Photos::class, 'slug', $title);
        $published_at = Carbon::parse($request->published_at)->toDateTimeLocalString();
        $description = $request->description;
        $kategorie = $request->kategorie;
        if (isset($request->published)) { $published = true; } else { $published = false; }

        $images = $request->hasFile('images');
        if (!empty($images))
        {
            foreach ($request->file('images') as $images) {
                $imageName = $images->getClientOriginalName();
                $nameToString = str_replace(' ', '_', $imageName);

                if (!Storage::disk('public')->exists('images/' . $slugAlbum)) {
                    Storage::disk('public')->makeDirectory('images/' . $slugAlbum);
                }

                if (!Storage::disk('public')->exists('images/' . $slugAlbum . '/thumbnails')) {
                    Storage::disk('public')->makeDirectory('images/' . $slugAlbum . '/thumbnails');
                }

                $watermark = public_path('images/watermark.png');
                $watermarkBig = public_path('images/watermarkBig.png');
                // Thumbnails
                $albumImages = Image::make($images)->fit(350)->insert($watermark, 'bottom-right', 10, 10)->stream();
                Storage::disk('public')->put('images/' . $slugAlbum . '/thumbnails/' . $nameToString, $albumImages);
                // Images
                $photoImages = Image::make($images)->resize(1920, 1080, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->insert($watermark, 'bottom-right', 10, 10)->stream();
                Storage::disk('public')->put('images/' . $slugAlbum . '/' . $nameToString, $photoImages);
                $data[] = $nameToString;
                $size[] = SomeClass::bytesToHuman($images->getSize());
            }
        } else {
            $data = "default.png";
            $size = SomeClass::bytesToHuman(25570);
        }

        $album = new Album();
        $album->title = $title;
        $album->name = $name;
        $album->slug = $slugAlbum;
        if (!empty($images)) {
            $album->size = $size[0];
            $album->images = $data[0];
        } else {
            $album->size = $size;
            $album->images = $data;
        }
        $album->description = $description;
        $album->published = $published;
        $album->kategorie = $kategorie;
        $album->user_id = $request->user_id;
        $album->published_at = $published_at;
        $album->save();

        if ($request->images == true) {
            if (count($request->images) > 0) {
                foreach ($request->images as $item=>$v) {
                    $fotos = array(
                        'user_id' => $request->user_id,
                        'album_id' => $album->id,
                        'title' => $title,
                        'name' => $name,
                        'slug' => $slugPhoto,
                        'size' => $size[$item],
                        'images' => $data[$item],
                        'description' => $description,
                        'published' => $published,
                        'published_at' => $published_at,
                        'updated_at' => now(),
                        'created_at' => now(),
                    );
                    Photos::insert($fotos);
                }
            }
        } else {
            $photos = array(
                'title' => $title,
                'name' => $name,
                'slug' => $slugPhoto,
                'user_id' => $request->user_id,
                'album_id' => $album->id,
                'size' => $size,
                'images' => $data,
                'description' => $description,
                'published' => $published,
                'published_at' => $published_at,
                'updated_at' => now(),
                'created_at' => now(),
            );
            Photos::insert($photos);
        }

        toastr()->success('Album wurde erfolgreich hinzugefügt');
        return redirect()->route('frontend.galerie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $album = Album::with('photos')->where('slug', '=', $id)->first();
//        dd($album);

        return view('frontend.galerie.show', compact('album', $album));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $galerie = Album::where('slug', '=', $id)->first();

        return view('frontend.galerie.edit', compact('galerie', $galerie));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Album $galerie
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Album $galerie)
    {
        $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", "´", " ", "_");
        $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue", "ss", "", "-", "-");

        $this->validate($request, [
            'title' => 'required',
            'kategorie' => 'required',
            'description' => 'max:255',
        ]);

        $title = $request->title;
        $name = strtolower(str_replace($search, $replace, $request->title));
        $slug = $request->slug;
        if ($galerie->title == $title) {
            $slugAlbum = $slug;
        } else {
            $slugAlbum = SlugService::createSlug(Album::class, 'slug', $title);
        }
        $kategorie = $request->kategorie;
        $published_at = Carbon::parse($request->published_at)->toDateTimeLocalString();
        $description = $request->description;

        $images = $request->images;
        $size = $request->size;
        if (isset($request->published)) {
            $published = true;
        } else {
            $published = false;
        }

        $galerie->user_id = $request->user_id;
        $galerie->title = $title;
        $galerie->name = $name;
        $galerie->size = $size;
        $galerie->images = $images;
        $galerie->kategorie = $kategorie;
        $galerie->description = $description;
        $galerie->published = $published;
        $galerie->published_at = $published_at;

        $photo = DB::table('photos')->where('album_id', $request->id)->update([
            'title' => $title,
            'name' => $name,
            'published' => $published,
            'published_at' => $published_at,
        ]);

        $galerie->save();

        toastr()->success('Album wurde geändert');
        return redirect()->route('frontend.galerie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Album $galerie
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Album $galerie)
    {
        if (Storage::disk('public')->exists('images/'.$galerie->slug.'/thumbnails')) {
            Storage::disk('public')->deleteDirectory('images/'.$galerie->slug.'/thumbnails');
        }

        if (Storage::disk('public')->exists('images/'.$galerie->slug)) {
            Storage::disk('public')->deleteDirectory('images/'.$galerie->slug);
        }
        $galerie->photos()->delete();
        $galerie->delete();

        toastr()->success('Album erfolgreich gelöscht');
        return redirect()->route('frontend.galerie.index');
    }
}
