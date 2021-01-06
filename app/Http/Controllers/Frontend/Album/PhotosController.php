<?php

namespace App\Http\Controllers\Frontend\Album;

use App\Http\Controllers\Controller;
use App\Models\Backend\Galerie\Photos\Photo;
use App\Models\Frontend\Album\Album;
use App\Models\Frontend\Album\Photos;
use App\Models\Helpers\SomeClass;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class PhotosController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:photo-list|photo-create|photo-edit|photo-delete', ['only' => 'store']);
        $this->middleware('permission:photo-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:photo-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:photo-delete', ['only' => ['destroy']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Album $photo
     * @return Application|Factory|View
     */
    public function edit(Album $photo)
    {
        $album = Photos::where('album_id', $photo->id)->get();

        return view('frontend.galerie.editPhotos', compact('photo', $photo, 'album', $album));
    }

    /**
     * @param Photos $photos
     */
    public function editPhoto(Photos $photos)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Album $photo
     * @return RedirectResponse
     */
    public function update(Request $request, Album $photo)
    {
        $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", "´", " ", "_");
        $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue", "ss", "", "-", "-");

        $title = $request->title;
        $name = strtolower(str_replace($search, $replace, $request->title));
        $slug = $request->slug;
        $published_at = Carbon::parse($request->published_at)->toDateTimeLocalString();
        $description = $request->description;

        if (isset($request->published)) {
            $published = true;
        } else {
            $published = false;
        }

        $images = $request->hasFile('images');
        if (!empty($images))
        {
            foreach ($request->file('images') as $images) {
                $imageName = $images->getClientOriginalName();
                $nameToString = str_replace(' ', '_', $imageName);

                if (!Storage::disk('public')->exists('images/' . $slug)) {
                    Storage::disk('public')->makeDirectory('images/' . $slug);
                }

                if (!Storage::disk('public')->exists('images/' . $slug . '/thumbnails')) {
                    Storage::disk('public')->makeDirectory('images/' . $slug . '/thumbnails');
                }

                $watermark = public_path('images/watermark.png');
                $watermarkBig = public_path('images/watermarkBig.png');
                // Thumbnails
                $albumImages = Image::make($images)->fit(350)->insert($watermark, 'bottom-right', 10, 10)->stream();
                Storage::disk('public')->put('images/' . $slug . '/thumbnails/' . $nameToString, $albumImages);
                // Images
                $photoImages = Image::make($images)->resize(1920, 1080, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->insert($watermark, 'bottom-right', 10, 10)->stream();
                Storage::disk('public')->put('images/' . $slug . '/' . $nameToString, $photoImages);
                $data[] = $nameToString;
                $size[] = SomeClass::bytesToHuman($images->getSize());
            }
        } else {
            $data = "default.png";
            $size = SomeClass::bytesToHuman(25570);
        }

        if (count($request->images) > 0) {
            foreach ($request->images as $item => $v) {
                $bilder = array(
                    'user_id' => $request->user_id,
                    'album_id' => $request->album_id,
                    'title' => $title,
                    'name' => $name,
                    'slug' => $slug,
                    'description' => $description,
                    'size' => $size[$item],
                    'images' => $data[$item],
                    'published' => $published,
                    'published_at' => $published_at,
                    'updated_at' => now(),
                    'created_at' => now(),
                );
                Photos::insert($bilder);
            }
        }

        DB::table('albums')->where('id', $request->album_id)
            ->update([
                'updated_at' => now()
            ]);

        toastr()->success('Bilder wurden erfolgreich dem Album hinzugefügt.');
        return redirect()->route('frontend.galerie.show', $photo->slug);
    }

    public function updatePreview(Request $request, Album $album, Photos $photos)
    {
        DB::table('albums')->where('id', $request->album_id)
            ->update([
                'images' => $request->images,
                'size' => $request->size,
                'updated_at' => now()
            ]);

        toastr()->success('Vorschaubild erfolgreich gesetzt!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Photos $photo
     * @return RedirectResponse
     */
    public function destroy(Photos $photo)
    {
        if (Storage::disk('public')->exists('images/'.$photo->slug.'/'.$photo->images)) {
            Storage::disk('public')->delete('images/'.$photo->slug.'/'.$photo->images);
        }

        if (Storage::disk('public')->exists('images/'.$photo->slug.'/thumbnails/'.$photo->images)) {
            Storage::disk('public')->delete('images/'.$photo->slug.'/thumbnails/'.$photo->images);
        }
        $photo->delete();
        toastr()->success('Bild wurde gelöscht!');
        return redirect()->route('frontend.galerie.show', $photo->slug);
    }
}
