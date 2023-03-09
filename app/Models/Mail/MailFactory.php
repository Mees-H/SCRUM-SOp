<?php

namespace App\Models\Mail;

use App\Models\Event;
use App\Models\Mail;
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
        $mail = new Mail\test($name,$event->name,$event->date);
        return $mail;
    }

}
