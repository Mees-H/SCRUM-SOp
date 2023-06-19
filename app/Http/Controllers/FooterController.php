<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    public function edit()
    {
        $footer = Footer::all()->first();
        return view('footer.edit', compact('footer'));
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'email' => ['required','email','max:255','regex:/^[a-zA-Z0-9.!#$%&’+\=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)$/'],
            'rekeningnummer' => ['required','max:255','regex:/^[A-Z]{2}[ ]?\d{2}[ ]?[A-Z]{4}[ ]?\d{4}[ ]?\d{4}[ ]?\d{2}$/'],
            'kvknr' => ['required','max:8','min:8'],
            'rsin' => ['required','max:9','min:9'],
        ]);
        $footer = Footer::all()->first();
        
        $footer->secretariaat = $request->get('email');
        $footer->rekeningnummer = $request->get('rekeningnummer');
        $footer->KvKnr = $request->get('kvknr');
        $footer->RSIN = $request->get('rsin');
        $footer->save();

        return redirect('/footer/edit')->with('success', 'Footer geüpdatet.');
    }
}