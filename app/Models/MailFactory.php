<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class MailFactory
{
    public function CreateMail(string $type, $arguments){
        switch ($type){
            case "event_registration":
                return $this->CreateEventRegistrationMail($arguments['name'],$arguments['event_id']);
        }
    }

    private function CreateEventRegistrationMail($name,$eventId) : Mailable{
        $text = 'hallo '.$name;
        $mail = new test($text);
        return $mail;
    }

}
