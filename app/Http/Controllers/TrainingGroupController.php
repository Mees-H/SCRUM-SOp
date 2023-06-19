<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TrainingSession;
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

    public function createParticipant()
    {
        return view('traininggroups/participant-create', ['groups' => TrainingSessionGroup::all()->sortBy('id')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $words = explode(' ', TrainingSessionGroup::all()->sortByDesc('id')->first()->Name);
        $id = $words[1] + 1;
        $group = new TrainingSessionGroup([
            'Name' => 'Groep '.$id
        ]);
        $group->save();

        return redirect('/traininggroups')->with('success', 'Groep toegevoegd.');
    }

    public function storeParticipant(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'max:255',
                'regex:/\b[A-Za-z ëäöïü]+\b/',
            ],
            'group' => 'required'
        ]);

        $participant = new Member([
            'Name' => $request->get('name'),
            'group_id' => $request->get('group')
        ]);

        $participant->save();

        return redirect('/traininggroups')->with('success', 'Lid toegevoegd.');
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

    public function destroyParticipant(string $id)
    {
        try{
            Member::findOrFail($id)->delete();
        } catch(\Exception $e){
            return redirect('/traininggroups')->with('danger', 'Persoon niet kunnen verwijderen.');
        }
        return redirect('/traininggroups')->with('success', 'Persoon verwijderd.');
    }
}
