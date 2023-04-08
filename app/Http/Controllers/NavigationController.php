<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Event;

class NavigationController extends Controller
{
    function index()
    {
        $sliders = Slider::all();
        return view('index', compact('sliders'));
    }
    function training()
    {
        return view('calendar.training');
    }
    function evenement()
    {
        return view('events.evenement', ['posts' => Event::all()]);
    }
    function faq()
    {
        return view('faq.faq');
    }
    function nieuwsbrief()
    {
        return view('news.nieuwsbrief');
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
