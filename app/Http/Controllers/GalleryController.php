<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Picture;
use Illuminate\Http\Request;
class GalleryController extends Controller
{
    public function showGallery($year)
    {
        $albums = Album::with('picture')->where('date', 'LIKE', $year . '%')->get()->sortByDesc('date');

        return view('Albums.galerijYear', [
            'albums' => $albums,
            'year' => $year
        ]);
    }
    public function show($year, $title)
    {
        $album = Album::with('picture')->where('title', $title)->first();
        $pictures = Picture::with('album')->where('album_id', $album->id)->get();

        return view('Albums.showAlbum', [
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
        return view('Gallery.index', compact('albums'));
    }

    public function create()
    {
        return view('Gallery.create');
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
        return view('Gallery.edit', compact('album'));
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
