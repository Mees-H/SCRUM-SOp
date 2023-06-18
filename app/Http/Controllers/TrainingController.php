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
        //Getting week numbers
        $date = Carbon::now();
        $weekFrom = $date->weekOfYear;
        $weekTo = $weekFrom + 3;
        $filteredTrainingSessions = $this->filterSessionsByDate($weekFrom);

        return view('training.training', [  'sessions' => $filteredTrainingSessions,
                                            'year' => $date->year,
                                            'weekFrom' => $weekFrom,
                                            'weekTo' => $weekTo]);
    }

    public function trainingOtherWeek(Request $request)
    {
        //Getting sessions
        $weekTo = $request->weekNumber + 3;
        $filteredTrainingSessions = $this->filterSessionsByDate($request->weekNumber);

        return view('training.training', [  'sessions' => $filteredTrainingSessions,
                                            'year' => Carbon::now()->year,
                                            'weekFrom' => $request->weekNumber,
                                            'weekTo' => $weekTo]);
    }

    private function filterSessionsByDate($weekNumber)
    {
        //Getting training sessions based on weeknumber
        $allTrainingSessions = TrainingSession::all();
        $filteredTrainingSessions = [];
        foreach($allTrainingSessions as $trainingSession){
            $date = Carbon::createFromFormat('Y-m-d', $trainingSession->Date);
            $sessionWeek = $date->weekOfYear;
            if($sessionWeek >= $weekNumber && $sessionWeek <= $weekNumber + 3){

                //Adding additional information
                $trainingSession->weekNumber = $sessionWeek;
                $weekmap = [
                    0 => 'Zondag',
                    1 => 'Maandag',
                    2 => 'Dinsdag',
                    3 => 'Woensdag',
                    4 => 'Donderdag',
                    5 => 'Vrijdag',
                    6 => 'Zaterdag'
                ];
                $monthmap = [
                    0 => 'Januari',
                    1 => 'Februari',
                    2 => 'Maart',
                    3 => 'April',
                    4 => 'Mei',
                    5 => 'Juni',
                    6 => 'Juli',
                    7 => 'Augustus',
                    8 => 'September',
                    9 => 'October',
                    10 => 'November',
                    11 => 'December',
                ];
                $trainingSession->weekDay = $weekmap[$date->dayOfWeek];
                $trainingSession->month = $monthmap[$date->month];
                $trainingSession->day = $date->day;

                $filteredTrainingSessions[] = $trainingSession;
            }
        }
        return $filteredTrainingSessions;
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
            'GroupNumber' => $request->get('group'),
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
        $session->GroupNumber = $request->get('group');
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
