<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
class GalleryController extends Controller
{
    public function index()
    {
        return view('galerij', [
            'albums' => Album::all()
        ]);
    }

    public function show($id, $title, $date)
    {
        return view('galerij', [
            'album' => Album::findOrFail($id, $title, $date)
        ]);
    }
    public function create()
    {
        return view('aanmakenAlbum');
    }

    public function store(Request $request)
    {
        $album = new Album();
        $album->title = $request->title;
        $album->date = $request->date;
        $album->save();
        return redirect()->route('galerij');
    }
}
