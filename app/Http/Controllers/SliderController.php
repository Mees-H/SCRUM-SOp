<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

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
        try{
            $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png,bmp,gif|max: 2000'
            ]);
            $uploadImage = $request->file('image');
            $imageNameWithExt = $uploadImage->getClientOriginalName();
            $imageName =pathinfo($imageNameWithExt, PATHINFO_FILENAME);
            $imageExt=$uploadImage->getClientOriginalExtension();
            $storeImage=$imageName . time() . "." . $imageExt;
            $request->image->move(public_path('img'), $storeImage);
            slider::create([
                'image' => $storeImage
            ]);
            return redirect('slider')->with('success', 'Afbeelding is succesvol geüpload');
        }
        catch (\Exception $e){
            return redirect('slider/create')->with('error', $e->getMessage());
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
