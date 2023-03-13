<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnrollController extends Controller
{
    function mail() 
    {
        //TODO: Implementeer mailstuff
        return redirect('aanmelden')->with('success', 'Uw aanmelding is verzonden!');
    }
}