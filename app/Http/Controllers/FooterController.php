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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email|max:255',
            'rekeningnummer' => 'required|max:255',
            'KvKnr' => 'required|max:8|min:8',
            'RSIN' => 'required|max:9|min:8',
        ]);
        $footer = Footer::all()->first();
        
        $footer->secretariaat = $request->get('email');
        $footer->rekeningnummer = $request->get('rekeningnummer');
        $footer->KvKnr = $request->get('KvKnr');
        $footer->RSIN = $request->get('RSIN');
        $footer->save();

        return redirect('/footer/edit')->with('success', 'Footer geüpdatet.');
    }
}
