<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Models\MemberGroup;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('members.index', ['members' => TeamMember::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create', ['groups' => MemberGroup::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:team_members,email|max:255|email',
            'phonenumber' => 'nullable|numeric|digits_between:10,10',
            'groups' => 'required'],
            ['groups.required' => 'Selecteer minimaal 1 groep.'],
            ['phonenumber.digits_between' => 'Telefoonnummer moet 10 cijfers zijn.']);
        $member = TeamMember::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phonenumber' => $request->get('phonenumber'),
            'function' => $request->get('function'),
            'website' => $request->get('website'),
            'imgurl' => $request->get('image')
        ]);

        //Saving image
        $this->storeImage($request, $member);

        return redirect('members')->with('success', 'Lid opgeslagen.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('members.edit', ['member' => TeamMember::findOrFail($id),
                                    'groups' => MemberGroup::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'groups' => 'required',
            'phonenumber' => 'nullable|numeric|digits_between:10,10',
        ], ['groups.required' => 'Selecteer minimaal 1 groep.'
        ], ['phonenumber.digits_between' => 'Telefoonnummer moet 10 cijfers zijn.']);



        $member = TeamMember::findOrFail($id);
        $member->name = $request->get('name');
        $member->email = $request->get('email');
        $member->phonenumber = $request->get('phonenumber');
        $member->function = $request->get('function');
        $member->website = $request->get('website');
        $member->groups()->detach();

        //Removing image
        if($member->imgurl != null)
        {
            $image = $member->imgurl;
            if (File::exists(public_path('img\\'.$image))) {
                File::delete(public_path('img\\'.$image));
            }
        }
        $member->imgurl = $request->get('image');

        //Updating image
        $this->storeImage($request, $member);

        return redirect('members')->with('success', 'Lid aangepast.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        try {
            $teammember = TeamMember::findOrFail($id);
            $teammember->groups()->detach();
            $teammember->delete();
            return redirect('/members')->with('success', 'Lid verwijderd.');
        } catch (Exception $e) {
            return redirect('/members')->with('error', 'Lid niet gevonden.');
        }
    }

    /**
     * @param Request $request
     * @param $member
     * @return void
     */
    public function storeImage(Request $request, $member): void
    {
        if ($request->hasFile('image')) {
            $destination_path = 'img';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->move($destination_path, $image_name);
            $member['imgurl'] = $image_name;
        }

        //Updating groups
        if ($request->get('groups') != null) {
            foreach ($request->get('groups') as $groupId) {
                $member->groups()->save(MemberGroup::find($groupId));
            }
        }
        $member->save();
    }
}
