<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Sitemap;

class SiteMapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sitemaps = Sitemap::all()->sortBy('updated_at');
        return view('sitemap.index', compact('sitemaps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sitemaps = Sitemap::all();
        return view('sitemap.create', compact('sitemaps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categorie' => 'required|max:255',
            'functie' => 'required|max:255',
            'naam' => 'required|max:255',
            'verwijzing' => 'required|max:255',
        ]);

        $sitemap = new Sitemap([
            'categorie' => $request->get('categorie'),
            'functie' => $request->get('functie'),
            'naam' => $request->get('naam'),
            'verwijzing' => $request->get('verwijzing')
        ]);
        $sitemap->save();

        return redirect('/links')->with('success', 'Link opgeslagen.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sitemap = Sitemap::findOrFail($id);
        return view('sitemap.edit', compact('sitemap'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'category' => 'required|max:255',
            'function' => 'required|max:255',
            'name' => 'required|max:255',
            'link' => 'required|max:255',
        ]);
        $sitemap = Sitemap::find($id);
        $sitemap->categorie = $request->get('category');
        $sitemap->functie = $request->get('function');
        $sitemap->naam = $request->get('name');
        $sitemap->verwijzing = $request->get('link');
        $sitemap->updated_at = $request->get('updated_at');
        $sitemap->save();

        return redirect('/links')->with('success', 'Evenement geupdatet.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Sitemap::findOrFail($id)->delete();
        return redirect('/links')->with('success', 'Sitemap verwijdert.');
    }
}
