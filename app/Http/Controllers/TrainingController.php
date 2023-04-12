<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\TrainingSession;
use App\Models\TrainingSessionGroup;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Event;
use Carbon\Carbon;

class TrainingController extends Controller
{
    function index()
    {
        $trainingSessions = TrainingSession::all()->sortBy(function ($item) {
            return $item['Date'];
        });;
        foreach($trainingSessions as $session){
            $session->weekNumber = $this->getWeekNumber($session->Date);
            $session->StartTime = Carbon::createFromFormat('H:i:s', $session->StartTime)->format('H:i');
            $session->EndTime = Carbon::createFromFormat('H:i:s', $session->EndTime)->format('H:i');
        }
        $trainingGroups = TrainingSessionGroup::all();
        foreach($trainingGroups as $group){
            $group->sessions = $trainingSessions->where('GroupNumber', '==', $group->GroupNumber);
        }
        return view('training', ['trainingGroups' => $trainingGroups]);
    }

    function getWeekNumber($dateString) {
        $date = Carbon::createFromFormat('Y-m-d', $dateString);
        return $date->weekOfYear;
    }

}
