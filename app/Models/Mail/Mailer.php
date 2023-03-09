<?php

namespace App\Models\Mail;

use http\Exception\InvalidArgumentException;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class Mailer
{
    /**
     * @param array $recepients an array of the recipients. the first element is assumed to be the primary recipient and the rest are bcc'd.
     * @param Mailable $mailable an object that extends laravel's Mailable class which represents the objact that is to be mailed.
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
            ->bcc($bcc)
            ->send($mailable);
    }

}
