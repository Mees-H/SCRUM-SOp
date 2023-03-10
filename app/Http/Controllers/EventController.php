<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Event;
use App\Models\Group;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all()->sortBy('updated_at');
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::all();
        return view('events.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:999',
            'date' => 'required|after:today'
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        $groups = Group::all();
        return view('events.edit', compact('event', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:999',
            'date' => 'required|after:today'
        ]);
        $event = Event::find($id);
        $event->title = $request->get('title');
        $event->date = $request->get('date');
        $event->time = $request->get('time');
        $event->body = $request->get('body');
        $event->updated_at = $request->get('updated_at');
        $event->groups()->detach();
        $event->save();
        
        if($request->get('groups') != null){
            foreach($request->get('groups') as $groupId){
                $event->groups()->save(Group::find($groupId));
            }
        }

        return redirect('/events')->with('success', 'Evenement geupdatet.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Event::findOrFail($id)->delete();
        return redirect('/events')->with('success', 'Evenement verwijdert.');
    }
}