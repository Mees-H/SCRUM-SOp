<?php

namespace App\Models;

use http\Exception\InvalidArgumentException;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class Mailer
{
    /**
     * params: recepients mailable
     * @return void
     */
    public static function Mail($recepients, Mailable $mailable){
        if(count($recepients)< 1){
            throw new InvalidArgumentException();
        }

        $recepient = $recepients[0];

        $bcc = [];

        for($i = 1; $i < count($recepients); $i++){
            array_push($bcc, $recepients[$i]);
        }

        Mail::to($recepient)
            ->cc($bcc)
            ->send($mailable);
    }

}
