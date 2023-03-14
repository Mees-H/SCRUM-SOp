<?php

namespace App\Models\Mail;

use App\Exceptions\InvalidArgumentException;
use App\Models\Event;
use App\Models\Mail;
use Illuminate\Mail\Mailable;

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
     * @throws InvalidArgumentException if the method was not found
     */
    public function createMail(string $type, $arguments) : Mailable{

        foreach ($this->types as $typee){
            if($type == $typee){
                $response = call_user_func(array($this,$typee),$arguments);
                return $response;
            }
        }
        throw new InvalidArgumentException(message: 'the right method was not found.');
    }

    /**
     * @param $arguments dictionary that contains at least the following keys: name and event_id
     * @return Mailable an object that extends the mailable class and is ready to be sent.
     * @throws InvalidArgumentException if the right arguments were not found
     */
    private function eventRegistration($arguments) : Mailable{
        if($arguments['name'] == null || $arguments['event_id'] == null){
            throw new InvalidArgumentException(message: 'the right arguments were not found.');
        }
        $name = $arguments['name'];
        $eventId = $arguments['event_id'];
        $event = Event::find($eventId);
        $text = 'hallo '.$name;
        $mail = new Mail\test($name,$event->name,$event->date);
        return $mail;
    }

}
