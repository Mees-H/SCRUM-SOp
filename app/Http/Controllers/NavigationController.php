<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\FAQ;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Event;
use App\Models\MemberGroup;

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
    function vragenantwoorden()
    {
        return redirect('vragenantwoorden');
    }
    function nieuwsbrief()
    {
        return view('news.nieuwsbrief');
    }
    function team()
    {
        return view('members/team', ['groups' => MemberGroup::all()]);
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
        return redirect('/links');
    }
}
