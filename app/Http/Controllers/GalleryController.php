<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Picture;
use Illuminate\Http\Request;
class GalleryController extends Controller
{
    public function index()
    {
        $albums = Album::with('picture')->get();

        return view('galerij', [
            'albums' => $albums,
        ]);
    }

    public function show($id)
    {
        $album = Album::with('picture')->find($id);
        $pictures = Picture::with('album')->where('album_id', $id)->get();
        return view('showAlbum', [
            'album' => $album,
            'pictures' => $pictures
        ]);
    }

    public function showGallery($year)
    {
        $albums = Album::with('picture')->find($year);

        return view('galerij', [
            'albums' => $albums,
        ]);
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
