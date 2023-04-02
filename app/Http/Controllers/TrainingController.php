<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function signout()
    {
        return view('training.signout');
    }

    public function sendsignoutmail() 
    {
        //1. validatie hier
        
        //2. mail versturen hier

        return redirect('training')->with('success', 'U heeft zich successvol afgemeld.');
    }
    
}
