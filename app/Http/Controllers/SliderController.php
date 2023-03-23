<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('./slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
            $request->image->move(public_path('images'), $storeImage);
            $carousel= slider::create([
                'image' => $storeImage
            ]);
            return redirect('slider');
        }
        catch (\Exception $e){
            return Redirect::back()->withErrors("Geen geldige afbeelding extensie");
        }
            
    }

    public function delete(Request $request){
        $slider = $request->slider;
        //naam van image ophalen uit database
        //image verwijderen uit local file
        DB::table('sliders')->get([
            'id' => $slider,
        ]);

        slider::where('id', $slider)->delete();

        return redirect('slider');
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