<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mail\Mailer;
use App\Models\Mail\MailFactory;

class EnrollController extends Controller
{
    function mail(Request $request)
    {
        //TODO: Implementeer mailstuff
        $mailFactory = new MailFactory();
        $mail = $mailFactory->createMail('eventRegistration',
                                ['name' => $request['name'], 'birthday' => $request['birthday'], 'email' => $request['emailaddress'], 'phonenumber' => $request['phonenumber'], 'address' => $request['address'], 'city' => $request['city'], 'disability' => $request['disability'], 'event_id' => $request['event_id']]);
        Mailer::Mail([], $mail, true);
        return redirect('aanmelden')->with('success', 'Uw aanmelding is verzonden!');
    }
}
