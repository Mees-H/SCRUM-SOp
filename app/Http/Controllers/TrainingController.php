<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TrainingSession;
use App\Models\TrainingSessionGroup;
use Carbon\Carbon;
use App\Http\Requests\WhitespaceRequest;
use App\Models\Mail\Mailer;
use App\Models\Mail\MailFactory;
use Illuminate\Http\Request;
use Exception;


class TrainingController extends Controller
{
    public function training()
    {
        $trainingSessions = TrainingSession::all()->sortBy(function ($item) {
            return $item['Date'];
        });

        foreach ($trainingSessions as $session) {
            $session->weekNumber = $this->getWeekNumber($session->Date);
            $session->StartTime = Carbon::createFromFormat('H:i:s', $session->StartTime)->format('H:i');
            $session->EndTime = Carbon::createFromFormat('H:i:s', $session->EndTime)->format('H:i');
        }
        $trainingGroups = TrainingSessionGroup::all();
        foreach ($trainingGroups as $group) {
            $group->sessions = $trainingSessions->where('GroupNumber', '==', $group->GroupNumber);
        }
        return view('training.training', ['trainingGroups' => $trainingGroups]);
    }

    //CRUD
    public function index(){
        return view('training.index', ['sessions' => TrainingSession::all()]);
    }

    public function create(){
        return view('training.create', ['groups' => TrainingSessionGroup::all()]);
    }

    public function store(Request $request){
        $request->validate([
            'date' => 'required|after:today',
            'starttime' => 'required',
            'endtime' => 'required|after:starttime',
            'body' => 'required|max:999',
            'group' => 'required'
        ]);

        $session = new TrainingSession([
            'Date' => $request->get('date'),
            'StartTime' => $request->get('starttime'),
            'EndTime' => $request->get('endtime'),
            'Description' => $request->get('body'),
            'group_id' => $request->get('group'),
            'IstrainingSession' => ($request->get('vacationweek') == 'true' ? '0' : '1')
        ]);
        $session->save();
        return redirect('/trainingSessions')->with('success', 'Trainingsessie opgeslagen.');

    }

    public function edit(string $id){
        try{
            $session = TrainingSession::findOrFail($id);
        } catch (Exception $e){
            return redirect('/trainingSessions')->with('error', 'Trainingsessie niet kunnen vinden.');
        }
        return view('training.edit', ['session' => $session,
                                    'groups' => TrainingSessionGroup::all()]);
    }

    public function update(Request $request, string $id){

        $request->validate([
            'date' => 'required|after:today',
            'starttime' => 'required|before:endtime',
            'endtime' => 'required|after:starttime',
            'body' => 'required|max:999',
            'group' => 'required'
        ]);

        try{
            $session = TrainingSession::findOrFail($id);
        } catch (Exception $e){
            return redirect('/trainingSessions')->with('error', 'Trainingsessie niet kunnen updaten.');
        }
        $session->Date = $request->get('date');
        $session->StartTime = $request->get('starttime');
        $session->EndTime = $request->get('endtime');
        $session->Description = $request->get('body');
        $session->group_id = $request->get('group');
        $session->IstrainingSession = ($request->get('vacationweek') == 'true' ? '0' : '1');
        $session->save();
        return redirect('/trainingSessions')->with('success', 'Trainingsessie opgeslagen.');
    }

    public function destroy(string $id){
        try{
            $result = TrainingSession::findOrFail($id);
        } catch (Exception $e){
            return redirect('/trainingSessions')->with('error', 'Trainingsessie niet kunnen verwijderen.');
        }
        $result->delete();
        return redirect('/trainingSessions')->with('success', 'Trainingsessie verwijderd.');
    }


    //Signout
    public function signout()
    {
        return view('training.signout');
    }

    public function sendsignoutmail(WhitespaceRequest $request)
    {
        //2. mail versturen hier
        $mailFactory = new MailFactory();
        $mail = $mailFactory->createMail(
            'trainingSignout',
            ['name' => $request['name'], 'date' => $request['date']]
        );
        Mailer::Mail([], $mail, true);

        return redirect()->back()->with('success', 'U heeft zich successvol afgemeld.');
    }

    //Private functions
    private function getWeekNumber($dateString)
    {
        $date = Carbon::createFromFormat('Y-m-d', $dateString);
        return $date->weekOfYear;
    }

}
