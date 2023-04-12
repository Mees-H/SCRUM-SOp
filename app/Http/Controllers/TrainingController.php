<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TrainingSession;
use App\Models\TrainingSessionGroup;
use Carbon\Carbon;
use App\Http\Requests\WhitespaceRequest;
use App\Models\Mail\Mailer;
use App\Models\Mail\MailFactory;


class TrainingController extends Controller
{
    function index()
    {
        $trainingSessions = TrainingSession::all()->sortBy(function ($item) {
            return $item['Date'];
        });
        ;
        foreach ($trainingSessions as $session) {
            $session->weekNumber = $this->getWeekNumber($session->Date);
            $session->StartTime = Carbon::createFromFormat('H:i:s', $session->StartTime)->format('H:i');
            $session->EndTime = Carbon::createFromFormat('H:i:s', $session->EndTime)->format('H:i');
        }
        $trainingGroups = TrainingSessionGroup::all();
        foreach ($trainingGroups as $group) {
            $group->sessions = $trainingSessions->where('GroupNumber', '==', $group->GroupNumber);
        }
        return view('training', ['trainingGroups' => $trainingGroups]);
    }

    function getWeekNumber($dateString)
    {
        $date = Carbon::createFromFormat('Y-m-d', $dateString);
        return $date->weekOfYear;
    }

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

        return redirect('training')->with('success', 'U heeft zich successvol afgemeld.');
    }

}