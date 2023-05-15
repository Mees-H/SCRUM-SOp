<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Picture;
use Illuminate\Http\Request;
class GalleryController extends Controller
{
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
    public function show($year, $title)
    {
        $album = Album::with('picture')->where('title', $title)->first();
        $pictures = Picture::with('album')->where('album_id', $album->id)->get();

        return view('albums.showAlbum', [
            'album' => $album,
            'pictures' => $pictures,
            'year' => $year
        ]);
    }

    function ShowAllYearsOfGallerys(){

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
        return view('gallery.edit', compact('album'));
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
}
