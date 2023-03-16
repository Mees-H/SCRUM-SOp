<?php

namespace App\Models\Mail;

use App\Models\TestEvent;
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
    public function createMail(string $type, $arguments) : Mailable
    {

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
        foreach($arguments as $key => $value) {
            if($value === '') {
                throw new InvalidArgumentException('argument is empty');
            }

            if($key == 'name' || $key == 'city') {
                if(!$this->validateWordsOnly($value)) throw new InvalidArgumentException('Name or city is invalid');
            }
            if($key == 'email') {
                if(!$this->validateEmail($value)) throw new InvalidArgumentException('Email is invalid');
            }
            if($key == 'phonenumber') {
                if(!$this->validatePhonenumber($value)) throw new InvalidArgumentException('Phonenumber is invalid');
            }
            if($key == 'address' || $key == 'disability') {
                if(!$this->generalValidation($value)) throw new InvalidArgumentException('Address or disability is invalid');
            }
        }
        $name = $arguments['name'];
        $birthday = $arguments['birthday'];
        $email = $arguments['email'];
        $phonenumber = $arguments['phonenumber'];
        $address = $arguments['address'];
        $city = $arguments['city'];
        $disability = $arguments['disability'];
        $eventId = $arguments['event_id'];
        $event = TestEvent::find($eventId);
//        ddd($event);
        $text = 'hallo '.$name;
        $mail = new Mail\RegisterMail($name,$birthday,$email,$phonenumber,$address,$city,$disability,$event->title,$event->date);
        return $mail;
    }

    private function generalValidation($argument) 
    {
        if (preg_match('/[;="]/', $argument)) {
            return false;
        } else {
            return true;
        }
    }

    private function validateWordsOnly($string) 
    {
        if (preg_match('/[-a-zA-Z \']/', $string) && $this->generalValidation($string)) {
            return true;
        } else {
            return false;
        }
    }

    private function validateEmail($string) 
    {
        if (filter_var($string, FILTER_VALIDATE_EMAIL) && $this->generalValidation($string)) {
            return true;
        } else {
            return false;
        }
    }

    private function validatePhonenumber($number) 
    {
        if (preg_match('/[a-zA-Z]/', $number) && $this->generalValidation($string)) {
            return false;
        } else {
            return true;
        }
    }

}
