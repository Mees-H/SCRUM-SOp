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
    public $birthday;
    public $email;
    public $phonenumber;
    public $address;
    public $city;
    public $disability;
    public $eventName;
    public $date;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $birthday, $email, $phonenumber, $address, $city, $disability, $eventName, $date)
    {
        $this->name = $name;
        $this->birthday = $birthday;
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
            subject: 'Test',
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
