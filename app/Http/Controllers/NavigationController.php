<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Models\Event;

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
        return view('events.evenement', ['posts' => Event::all()]);
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

    function partner()
    {
        return view('partner');
    }

    function overons()
    {
        return view('overons');
    }

    function locatie()
    {
        return view('locatie');
    }

    function links()
    {
        return view('links');
    }
}
