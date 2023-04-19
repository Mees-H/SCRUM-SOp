<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MailPostEventRequest;
use App\Models\Mail\Mailer;
use App\Models\Mail\MailFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Event;
use App\Models\Group;
use function PHPUnit\Framework\isEmpty;

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

        try {
            $event = Event::findOrFail($id);
            $first_group = $event->groups->first();
            $groups = $event->groups;
            return view('detailEvenement', compact('event', 'first_group'), compact('groups'));
        } catch (\Exception $e) {
            return redirect('/evenement')->with('error', 'Evenement niet gevonden.');
        }
    }

    public function enroll(int $id)
    {
        return view('events.aanmelden', ['eventId' => $id]);
    }

    public function submit(MailPostEventRequest $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'birthday' => 'required|date|before:today',
            'golfhandicap' => 'max:255',
            'email' => 'required|email',
            'phonenumber' => 'required|numeric',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'event_id' => 'required|numeric'
        ]);
        $mailFactory = new MailFactory();
        $golfhandicap = "Niet ingevoerd";
        if(isset($request['golfhandicap']) && !empty($request['golfhandicap'])){
            $golfhandicap = $request['golfhandicap'];
        }
        $mail = $mailFactory->createMail('eventRegistration',
            ['name' => $request['name'], 'birthday' => $request['birthday'], 'email' => $request['email'], 'phonenumber' => $request['phonenumber'], 'address' => $request['address'], 'city' => $request['city'], 'golfhandicap' => $golfhandicap, 'event_id' => $request['event_id']]);
        Mailer::Mail([], $mail, true);
        return redirect('evenement')->with('success', 'Uw aanmelding is verzonden!');
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

        return redirect('/events')->with('success', 'Evenement geüpdatet.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Event::findOrFail($id)->delete();
        return redirect('/events')->with('success', 'Evenement verwijderd.');
    }
}
