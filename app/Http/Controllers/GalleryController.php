<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Picture;
use Illuminate\Http\Request;
use Image;
use Storage;

class GalleryController extends Controller
{
    public function showGallery($year)
    {
        $albums = Album::with('picture')->where('date', 'LIKE', $year . '%')->get()->sortByDesc('date');

        return view('Gallery.galerijYear', [
            'albums' => $albums,
            'year' => $year
        ]);
    }
    public function show($year, $title)
    {
        $album = Album::with('picture')->where('title', $title)->first();
        $pictures = Picture::with('album')->where('album_id', $album->id)->get();

        return view('Gallery.showAlbum', [
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
    public function create()
    {
        return view('Gallery.aanmakenAlbum');
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
        return view('Gallery.verwijderenAlbum');
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
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $request->image->move(public_path('images'), $imageName);

        foreach ($request->file('images') as $imagefile) {
            $path = $imagefile->store('/images/resource', ['disk' => 'galerij_fotos']);
            Picture:create([
                'album_id' => $request->album_id,
                'imageUrl' => $path
            ]);
            $image->save();
        }

        return redirect('/galerij')->with('success', 'Afbeelding is toegevoegd aan album');
    }

    public function deleteAlbumPictures(Request $request)
    {
        foreach($request->images as $image){
            $image->delete();
            Picture::where('id', $request->id)->delete();
        }

        if(count($request->images) > 1){
            return redirect('/galerij')->with('success', 'Afbeeldingen zijn verwijderd uit album');
        }
        else{
            return redirect('/galerij')->with('success', 'Afbeelding is verwijderd uit album');
        }
    }
}
