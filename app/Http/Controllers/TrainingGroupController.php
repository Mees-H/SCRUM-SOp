<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TrainingSessionGroup;
use App\Models\Member;
use Illuminate\Http\Request;

class TrainingGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('traininggroups/index', ['groups' => TrainingSessionGroup::all()->sortBy('id')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('traininggroups/create', ['participants' => Member::all()->where('GroupNumber', '==', null)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $group = new TrainingSessionGroup([
            'Name' => $request->get('name')
        ]);
        $group->save();
        
        if ($request->get('participants') != null) {
            foreach ($request->get('participants') as $participantId) {
                $group->participants()->save(Member::find($participantId));
            }
        }
        $group->save();

        return redirect('/traininggroups')->with('success', 'Groep toegevoegd.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            TrainingSessionGroup::find($id)->delete();
        } catch(\Exception $e){
            return redirect('/traininggroups')->with('danger', 'Groep niet kunnen verwijderen.');
        }
        return redirect('/traininggroups')->with('success', 'Groep verwijderd.');
    }
}
