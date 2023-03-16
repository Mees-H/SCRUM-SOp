<?php

namespace App\Models\Mail;

use App\Models\TestEvent;
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
    public function createMail(string $type, $arguments) : Mailable
    {

        foreach ($this->types as $typee){
            if($type == $typee){
                return call_user_func(array($this,$typee),$arguments);
            }
        }
        throw new InvalidArgumentException('the right method was not found.');
    }

    private function eventRegistration($arguments) : Mailable
    {
        foreach($arguments as $key => $value) {
            if($value === '') {
                throw new InvalidArgumentException('argument is empty');
            }

            if($key == 'name' || $key == 'city') {
                if(!$this->validateWordsOnly($value)) throw new InvalidArgumentException('the right arguments were not found.');
            }
            if($key == 'email') {
                if(!$this->validateEmail($value)) throw new InvalidArgumentException('the right arguments were not found.');
            }
            if($key == 'phonenumber') {
                if(!$this->validatePhonenumber($value)) throw new InvalidArgumentException('the right arguments were not found.');
            }
            if($key == 'address' || $key == 'disability') {
                if(!$this->generalValidation($value)) throw new InvalidArgumentException('the right arguments were not found.');
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
        if (preg_match('/[^;="]/', $argument)) {
            return false;
        } else {
            return true;
        }
    }

    private function validateWordsOnly($string) 
    {
        if (preg_match('/^[a-zA-Z -\']+$/', $string) && $this->generalValidation($string)) {
            return true;
        } else {
            return false;
        }
    }

    private function validateEmail($string) 
    {
        if (filter_var($string, FILTER_VALIDATE_EMAIL) && generalValidation($string)) {
            return true;
        } else {
            return false;
        }
    }

    private function validatePhonenumber($number) 
    {
        $number = preg_replace('/[\D]/', '', $number);
        if(strlen($number) == 10) {
            return true;
        } else {
            return false;
        }
    }

}
