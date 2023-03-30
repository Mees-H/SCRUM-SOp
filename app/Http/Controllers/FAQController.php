<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    function index() {
        $FAQ = FAQ::all();
        return view('faq.index', compact('FAQ'));
    }

    function create() {
        $FAQ = FAQ::all();
        return view('faq.create', compact('FAQ'));
    }

    function store(Request $request)
    {
        $attributes = $request->validate([
            'vraag' => 'required|max:255',
            'antwoord' => 'required|max:999',
        ]);

        FAQ::create(['question' => $attributes['vraag'], 'answer' => $attributes['antwoord']]);

        return redirect('/faq')->with('success', 'Vraag & antwoord opgeslagen.');
    }

    function edit(string $id) {
        $FAQ = FAQ::findOrFail($id);
        return view('faq.edit', compact('FAQ'));
    }

    function update(Request $request, string $id)
    {
        $attributes = $request->validate([
            'vraag' => 'required|max:255',
            'antwoord' => 'required|max:999',
        ]);

        FAQ::find($id)->update($attributes);

        return redirect('/faq')->with('success', 'Vraag & antwoord geupdatet.');
    }

    function destroy(string $id)
    {
        FAQ::findOrFail($id)->delete();
        return redirect('/faq')->with('success', 'Vraag & antwoord verwijdert.');
    }
}
