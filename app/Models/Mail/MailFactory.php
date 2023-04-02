<?php

namespace App\Models\Mail;

use App\Exceptions\InvalidArgumentException;
use App\Models\Event;
use App\Models\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\DB;

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
    public function createMail(string $type, $arguments) : Mailable
    {
        //deze functie roept de methode in deze klasse aan die overeenkomt met de 'type' parameter
        foreach ($this->types as $typee){
            if($type == $typee){
                $response = call_user_func(array($this,$typee),$arguments);
                return $response;
            }
        }
        throw new InvalidArgumentException(message: 'de aangegeven methode werd niet gevonden');
    }

    private function eventRegistration($arguments) : Mailable
    {
        if($arguments['name'] == null ||
            $arguments['birthday'] == null ||
            $arguments['email'] == null ||
            $arguments['phonenumber'] == null ||
            $arguments['address'] == null ||
            $arguments['city'] == null ||
            $arguments['disability'] == null ||
            $arguments['event_id'] == null
        ){
            throw new InvalidArgumentException('niet alle argumenten waren gevonden');
        }

        $name = $arguments['name'];
        $birthday = $arguments['birthday'];
        $email = $arguments['email'];
        $phonenumber = $arguments['phonenumber'];
        $address = $arguments['address'];
        $city = $arguments['city'];
        $disability = $arguments['disability'];
        $eventId = $arguments['event_id'];
        $event = Event::find($eventId) ?: throw new InvalidArgumentException('evenement is niet gevonden');
        $age = date_diff(date_create($birthday), date_create(date('Y-m-d')))->format('%y');

        if($age <= 0) {
            throw new InvalidArgumentException('geboortedatum ligt in de toekomst');
        }

        $text = 'hallo '.$name;
        $mail = new Mail\RegisterMail($name,$age,$email,$phonenumber,$address,$city,$disability,$event->title,$event->date);
        return $mail;
    }

    private function trainingSignout($arguments) : Mailable
    {
        if($arguments['name'] == null ||
            $arguments['date'] == null 
        ){
            throw new InvalidArgumentException('niet alle argumenten waren gevonden');
        }

        $name = $arguments['name'];
        $date = $arguments['date'];

        $mail = new Mail\SignoutMail($name,$date);
        return $mail;
    }
}
