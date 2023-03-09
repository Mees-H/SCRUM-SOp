<?php

namespace App\Models;

use App\Models\test;
use App\Models\Event;
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
        $event = Event::find($eventId);
        $text = 'hallo '.$name;
        $mail = new test($name,$event->name,$event->date);
        return $mail;
    }

}
