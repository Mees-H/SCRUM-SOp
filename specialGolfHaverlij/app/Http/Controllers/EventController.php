<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'date' => 'required',
        ]);
        $event = new Event([
            'title' => $request->get('title'),
            'id' => $request->get('id'),
            'date' => $request->get('date'),
            'slug' => 'event_' . $request->get('id'),
            'body' => $request->get('body'),
            'created_at' => $request->get('created_at'),
            'updated_at' => $request->get('updated_at'),
        ]);
        $event->save();
        return redirect('/events')->with('success', 'Evenement opgeslagen.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::find($id);
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'slug' => 'required',
        ]);
        $event = Event::find($id);
        $event->title = $request->get('title');
        $event->date = $request->get('date');
        $event->body = $request->get('body');
        $event->updated_at = $request->get('updated_at');
        $event->save();

        return redirect('/events')->with('success', 'Evenement geupdatet.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Event::find($id)->delete();
        return redirect('/events')->with('success', 'Evenement verwijdert.');
    }
}
