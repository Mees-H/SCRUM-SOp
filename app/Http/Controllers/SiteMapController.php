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
            'functie' => 'required|max:999',
            'naam' => 'required|after:today',
            'verwijzing' => '',
        ]);

        $event = new Event([
            'title' => $request->get('title'),
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'body' => $request->get('body')
        ]);

        $event->save();
        if($request->get('groups') != null){
            foreach($request->get('groups') as $groupId){
                $event->groups()->save(Group::find($groupId));
            }
        }
        $event->slug = 'event_' . $event->id;
        $event->save();

        return redirect('/events')->with('success', 'Evenement opgeslagen.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $links = Sitemap::all()->groupBy('categorie');

        return view('links', ['links' => $links]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
