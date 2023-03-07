<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
class GalleryController extends Controller
{
    public function index()
    {
        return view('gallery');
    }
    public function create()
    {
        return view('CreateAlbum');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $form_data = array(
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName
        );
        Gallery::create($form_data);
        return redirect('gallery')->with('success', 'Data Added successfully.');
    }
}
