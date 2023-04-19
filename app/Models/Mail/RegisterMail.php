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
    public $golfhandicap;
    public $eventName;
    public $date;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $age, $email, $phonenumber, $address, $city, $golfhandicap, $eventName, $date)
    {
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
        $this->phonenumber = $phonenumber;
        $this->address = $address;
        $this->city = $city;
        $this->golfhandicap = $golfhandicap;
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
