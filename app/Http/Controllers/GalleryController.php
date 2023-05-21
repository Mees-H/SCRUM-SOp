<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Picture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Storage;

class GalleryController extends Controller
{
    public function addPhoto(Request $request)
    {
        $validated = $request->validate([
            'album_id' => 'required|integer|exists:albums,id',
        ]);

        $album_id = $validated['album_id'];
        $album = Album::find($album_id);

        $year = Carbon::parse($album->date)->format('Y');

        $title = $album->title;

        return view('Gallery.fotoToevoegen', ['album' => $album, 'year' => $year, 'title' => $title]);
    }

    public function showGallery($year)
    {
        //withCount = tel het aantal foto's dat een album heeft en voeg het toe als variable
        $albums = Album::withCount('picture')->where('date', 'LIKE', $year . '%')->get()->sortByDesc('date');

        foreach ($albums as $key => $album) {
            if ($album->picture_count <= 0) {
                //als een album geen foto's heeft, verwijder hem dan uit de $albums array
                unset($albums[$key]);
            }
        }

        return view('albums.galerijYear', [
            'albums' => $albums,
            'year' => $year
        ]);
    }

    public function show(string $id, string $year)
    {
        $album = Album::with('picture')->where('id', $id)->first();
        if ($album === null) {
            return redirect()->action([GalleryController::class, 'showGallery'], ['year' => $year]);
        }
        $pictures = Picture::with('album')->where('album_id', $id)->get();
        $year = Carbon::parse($album->date)->year;

        return view('albums.showAlbum', [
            'album' => $album,
            'pictures' => $pictures,
            'year' => $year
        ]);
    }

    function ShowAllYearsOfGallerys()
    {

        //jaar eruit filteren
        $allYears = array();
        $years = Album::with('picture')->select('date')->get()->sortByDesc('date');
        foreach ($years as $year) {
            $allYears[] = date('Y', strtotime($year->date));
        }
        //distinct maken op basis van jaar
        return array_unique($allYears);
    }


    /// Dit is voor een andere user story, deze wordt later gemaakt. Jira: S8S-32 en S8S-33///

    public function index()
    {
        $albums = Album::all();
        return view('gallery.index', compact('albums'));
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:999',
            'date' => 'required'
        ]);

        $album = new Album();
        $album->title = $request->title;
        $album->date = $request->date;
        $album->description = $request->description;
        $album->save();

        return redirect('/galerij')->with('success', 'Album is aangemaakt.');
    }

    public function edit(string $id)
    {
        $album = Album::findOrFail($id);
        $year = Carbon::parse($album->date)->year;
        $pictures = Picture::with('album')->where('album_id', $album->id)->get();

        return view('Gallery.edit', compact('album', 'year', 'pictures'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attributes = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:999',
            'date' => 'required'
        ]);

        Album::where('id', $id)->update(['title' => $attributes['title'], 'description' => $attributes['description'], 'date' => $attributes['date']]);


        return redirect('/galerij')->with('success', 'Album geüpdatet.');
    }

    public function destroy(string $id)
    {
        Album::findOrFail($id)->delete();
        return redirect('/galerij')->with('success', 'Album verwijderd.');
    }

    public function updateAlbumDescription(Request $request)
    {
        $request->validate([
            'description' => 'required'
        ]);
        Album::where('id', $request->id)->update(['description' => $request->description]);
        return redirect('/galerij')->with('success', 'Album is aangepast');
    }

    public function addAlbumPictures(Request $request)
    {
        $request->validate([
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        foreach ($request->images as $image) {
            //if image is not a file, throw an error (400)
            if (!is_file($image)) {
                return response()->json(['error' => 'The image is not a file'], 400);
            } else {
                $imageNameWithExt = $image->getClientOriginalName();
                $imageName = pathinfo($imageNameWithExt, PATHINFO_FILENAME);
                $imageExt = $image->getClientOriginalExtension();
                $storeImage = $imageName . time() . "." . $imageExt;

                $image->move(public_path('images'), $storeImage);

                Picture::create([
                    'album_id' => $request->album_id,
                    'image' => $storeImage
                ]);
            }
        }

        return redirect('/galerij')->with('success', 'Afbeelding is toegevoegd aan album');
    }

    public function deleteAlbumPictures(Request $request)
    {
        Picture::destroy($request->images);
        if (!isset($request->images)) {
            return redirect()->back()->with('error', 'Er is geen afbeelding geselecteerd');
        }
        if (count($request->images) > 1) {
            return redirect('/galerij')->with('success', 'Afbeeldingen zijn verwijderd uit album');
        } else {
            return redirect('/galerij')->with('success', 'Afbeelding is verwijderd uit album');
        }
    }
}
