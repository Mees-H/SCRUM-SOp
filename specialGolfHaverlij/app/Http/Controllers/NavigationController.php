<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NavigationController extends Controller
{
    function index() 
    {
        return view('index');
    }
    function training() 
    {
        return view('training');
    }
    function evenement() 
    {
        return view('evenement');
    }
    function gallerij() 
    {
        return view('gallerij');
    }
    function aanmelden() 
    {
        return view('aanmelden');
    }
    function faq() 
    {
        return view('faq');
    }
    function nieuwsbrief() 
    {
        return view('nieuwsbrief');
    }
    function team() 
    {
        return view('team');
    }
    function trainingCMS() 
    {
        $trainingen = DB::table('trainings')->get();
        return view('trainingCMS', ['trainingen' => $trainingen]);
    }

    public function store(Request $request)
    {
        //validatie hier

        $post = new Training;
        $post->naam = $request->name;
        $post->datum = $request->date;
        $post->starttijd = $request->start;
        $post->eindtijd = $request->end;
        $post->locatie = $request->location;
        $post->trainers = $request->trainers;
        $post->save();
        return redirect('trainingCMS')->with('status', 'De training is toegevoegd!');
    }
}
