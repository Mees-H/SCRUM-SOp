<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MailPostTrainingRequest;
use App\Http\Requests\WhitespaceRequest;
use App\Models\Mail\Mailer;
use App\Models\Mail\MailFactory;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function signout()
    {
        return view('training.signout');
    }

    public function sendsignoutmail(WhitespaceRequest $request) 
    {
        //2. mail versturen hier
        $mailFactory = new MailFactory();
        $mail = $mailFactory->createMail('trainingSignout',
            ['name' => $request['name'], 'date' => $request['date']]);
        Mailer::Mail([], $mail, true);

        return redirect('training')->with('success', 'U heeft zich successvol afgemeld.');
    }
    
}
