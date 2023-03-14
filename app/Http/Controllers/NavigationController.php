<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('evenement');
    }
    function galerij() 
    {
        return view('galerij');
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


    function J2023() {
        return view('galerij2023');
    }

    function J2022() {
        return view('galerij2022');
    }

    function J2021() {
        return view('galerij2021');
    }
}