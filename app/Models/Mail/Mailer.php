<?php

namespace App\Models\Mail;

use http\Exception\InvalidArgumentException;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use League\Flysystem\Config;

class Mailer
{
    /**
     * @param array $recepients an array of the recipients. If $toStandard is false the first element is assumed to be the primary recipient and the rest are bcc'd.
     * Otherwise the standard send to adress is used as recepient, and all the adresses in this array are BCC'd.
     * @param Mailable $mailable an object that extends laravel's Mailable class which represents the objact that is to be mailed.
     * @param boolean $toStandard determines if a mail is to be sent to the standard email adress.
     * @return void
     */
    public static function Mail($recepients, Mailable $mailable, bool $toStandard){
        if($toStandard){
            array_unshift($recepients,Config('mail.to.address'));
        }

        if(count($recepients)< 1){
            throw new InvalidArgumentException();
        }

        $recipient = $recepients[0];

        $bcc = [];

        for($i = 1; $i < count($recepients); $i++){
            array_push($bcc, $recepients[$i]);
        }

        Mail::to($recipient)
            ->bcc($bcc)
            ->send($mailable);
    }

}
