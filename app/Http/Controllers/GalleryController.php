<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
class GalleryController extends Controller
{
    public function index()
    {
        /*return view('galerij', [
            'albums' => Album::all()
        ]);*/
        $albums = Album::with('picture')->get();
        return view('galerij', compact('albums'));

    }

/*    public function show($id)
    {
        return view('galerij', [
            'album' => Album::findOrFail($id)
        ]);
    }*/
    public function create()
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
        $album->save();
        return redirect('/galerij')->with('success', 'Album is aangemaakt!');
    }
}
