<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailPostEventRequest;
use App\Models\Event;
use App\Models\Group;
use App\Models\Mail\Mailer;
use App\Models\Mail\MailFactory;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
        return view('partners.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::all();
        return view('partners.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'housenumber' => 'integer|required',
            'street' => 'required|max:255',
            'zipcode' => 'required|max:255',
            'city' => 'required|max:255',
            'link' => 'required|max:255',
            'contact_person' => 'required|max:255',
            'imageurl' => 'required|max:255',
        ]);

        $currently_a_partner = false;
        if ($request->has('currently_a_partner')) {
            $currently_a_partner = true;
        }

        $group = new Group([
            'name' => $request->get('name'),
            'housenumber' => $request->get('housenumber'),
            'street' => $request->get('street'),
            'zipcode' => $request->get('zipcode'),
            'city' => $request->get('city'),
            'link' => $request->get('link'),
            'contact_person' => $request->get('contact_person'),
            'imageurl' => $request->get('imageurl'),
            'currently_a_partner' => $currently_a_partner
        ]);

        $group->save();

        return redirect('/groups')->with('success', 'Partner opgeslagen.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $group = Group::all()->where('id', $id)->first();
        return view('partners.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'housenumber' => 'integer|required',
            'street' => 'required|max:255',
            'zipcode' => 'required|max:255',
            'city' => 'required|max:255',
            'link' => 'required|max:255',
            'contact_person' => 'required|max:255',
            'imageurl' => 'required|max:255',
        ]);
        
        $isPartner = false;
        if ($request->has('currently_a_partner')) {
            $isPartner = true;
        }
        $group = Group::find($id);
        $group->name = $request->get('name');
        $group->housenumber = $request->get('housenumber');
        $group->street = $request->get('street');
        $group->zipcode = $request->get('zipcode');
        $group->city = $request->get('city');
        $group->link = $request->get('link');
        $group->contact_person = $request->get('contact_person');
        $group->imageurl = $request->get('imageurl');
        $group->currently_a_partner = $isPartner;
        $group->save();

        return redirect('/groups')->with('success', 'Partner geüpdatet.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Group::findOrFail($id)->events()->detach();
        Group::findOrFail($id)->delete();
        return redirect('/groups')->with('success', 'Partner verwijderd.');
    }
}
