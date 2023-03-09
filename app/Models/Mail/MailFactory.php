<?php

namespace App\Models\Mail;

use App\Models\Event;
use App\Models\Mail;
use Illuminate\Mail\Mailable;

class MailFactory
{
    private $types = [];
    private $forbiddenMethods = ['__construct', 'CreateMail'];

    public function __construct()
    {
        $tempTypes = get_class_methods(get_class($this));
        foreach ($tempTypes as $tempType){
            if(in_array($tempType,$this->forbiddenMethods)) continue;
            array_push($this->types,$tempType);
        }
    }

    public function CreateMail(string $type, $arguments){

        foreach ($this->types as $typee){
            if($type == $typee){
                return call_user_func(array($this,$typee),$arguments);
            }
        }
    }

    private function event_registration($arguments) : Mailable{
        $name = $arguments['name'];
        $eventId = $arguments['event_id'];
        $event = Event::find($eventId);
        $text = 'hallo '.$name;
        $mail = new Mail\test($name,$event->name,$event->date);
        return $mail;
    }

}
