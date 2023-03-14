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
        return view('evenement', ['posts' => Event::all()]);
    }
    function galerij()
    {
        $allYears = $this->allYears();
        return view('galerij', [
            'allYears' => $allYears
        ]);
    }

    function dropdown()
    {
        $allYears = $this->allYears();
        return view('dropdownYears', [
            'allYears' => $allYears
        ]);
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
    function allYears(){
        //jaar eruit filteren
        $allYears = array();
        $years = Album::with('picture')->select('date')->get();
        foreach ($years as $year) {
            $allYears[] = date('Y', strtotime($year->date));
        }
        //distinct maken op basis van jaar
        return array_unique($allYears);
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
