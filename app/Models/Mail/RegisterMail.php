<?php

namespace App\Models\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $age;
    public $email;
    public $phonenumber;
    public $address;
    public $city;
    public $disability;
    public $eventName;
    public $date;
    public $gender;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $age, $gender, $email, $phonenumber, $address, $city, $disability, $eventName, $date)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->email = $email;
        $this->phonenumber = $phonenumber;
        $this->address = $address;
        $this->city = $city;
        $this->disability = $disability;
        $this->eventName = $eventName;
        $this->date = $date;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Inschrijving evenement '.$this->eventName
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.registrationmail'
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
