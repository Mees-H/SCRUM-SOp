<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Error;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $sliders = Slider::all()->sortByDesc('id');
        return view('slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('./slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            $uploadImage = $request->file('image');
            $imageNameWithExt = $uploadImage->getClientOriginalName();
            $imageName = pathinfo($imageNameWithExt, PATHINFO_FILENAME);
            $imageExt = $uploadImage->getClientOriginalExtension();
            $storeImage = $imageName . time() . "." . $imageExt;
            $request->image->move(public_path('img'), $storeImage);
            slider::create([
                'image' => $storeImage
            ]);
            return redirect('slider')->with('success', 'Afbeelding is succesvol geüpload');
        } catch (Error $e) {
            return redirect('slider/create')->withErrors($e->getMessage())->withInput();
        }

    }

    public function delete(Request $request){
        try {
            $sliderid = $request->slider;
            $imageurl = slider::find($sliderid)->image;
            if (File::exists(public_path('img\\'.$imageurl))) {
                File::delete(public_path('img\\'.$imageurl));
            }

            slider::where('id', $sliderid)->delete();

            return redirect('slider')->with('success', 'Afbeelding is succesvol verwijderd');
        } catch (\Exception $e) {
            return redirect('slider')->with('error', $e->getMessage());
        }
      }

}
