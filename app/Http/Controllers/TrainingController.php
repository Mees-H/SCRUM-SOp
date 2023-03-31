<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\TrainingSession;
use App\Models\TrainingSessionGroup;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Event;

class TrainingController extends Controller
{
    function index()
    {
        $trainingSessions = TrainingSession::all();
        return view('training', compact('trainingSessions'));
    }
}
