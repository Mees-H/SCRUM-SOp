<?php

namespace App\Models\Mail;

use App\Models\Event;
use App\Models\Mail;
use http\Exception\InvalidArgumentException;
use Illuminate\Mail\Mailable;
use mysql_xdevapi\Exception;

class MailFactory
{
    private $types = [];
    private $forbiddenMethods = ['__construct', 'CreateMail'];

    /**
     * finds all methods and puts them in $types for future reference
     */
    public function __construct()
    {
        $tempTypes = get_class_methods(get_class($this));
        foreach ($tempTypes as $tempType){
            if(in_array($tempType,$this->forbiddenMethods)) continue;
            array_push($this->types,$tempType);
        }
    }

    /**
     * @param string $type name of the method to be accessed
     * @param array $arguments dictionary with as keys the variable names
     * @return Mailable an object that extends the mailable class and is ready to be sent.
     */
    public function CreateMail(string $type, $arguments) : Mailable{

        foreach ($this->types as $typee){
            if($type == $typee){
                return call_user_func(array($this,$typee),$arguments);
            }
        }
        throw new InvalidArgumentException('the right method was not found.');
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
