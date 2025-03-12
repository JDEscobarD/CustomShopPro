<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordResetEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $pin;
    public function __construct($pin)
    {
        $this->pin = $pin;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Solicitud de cambio de contraseña',
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'auth.reset-password',            
        );
    }

    /**
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
