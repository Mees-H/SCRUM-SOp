<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class NavigationController extends Controller
{
    //
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
        return view('evenement', ['posts' => Event::all()]);
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
}
