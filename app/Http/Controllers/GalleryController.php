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
       // dd($albums, $year);

        return view('galerijYear', [
            'albums' => $albums,
            'year' => $year
        ]);
    }
    public function show($year, $title)
    {
        $album = Album::with('picture')->where('title', $title)->first();
        $pictures = Picture::with('album')->where('album_id', $album->id)->get();

        return view('showAlbum', [
            'album' => $album,
            'pictures' => $pictures,
            'year' => $year
        ]);
    }

    function ShowAllYearsOfGallerys(){
        //jaar eruit filteren
        $allYears = array();
        $years = Album::with('picture')->select('date')->get();
        foreach ($years as $year) {
            $allYears[] = date('Y', strtotime($year->date));
        }
        //distinct maken op basis van jaar
        return array_unique($allYears);
    }


    /// Dit is voor een andere user story, deze wordt later gemaakt. Jira: S8S-32 en S8S-33///

    /*public function create()
    {
        return view('aanmakenAlbum');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required'
        ]);

        $album = new Album();
        $album->title = $request->title;
        $album->date = $request->date;
        $album->description = $request->description;
        $album->save();

        return redirect('/galerij')->with('success', 'Album is aangemaakt');
    }
    public function delete()
    {
        return view('verwijderenAlbum');
    }*/
}
