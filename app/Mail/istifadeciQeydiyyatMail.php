<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\istifadeci;

class istifadeciQeydiyyatMail extends Mailable
{
    use Queueable, SerializesModels;

    public $istifadeci;

    /**
     * Create a new message instance.
     */
    public function __construct(istifadeci $parametr)
    {
        $this->istifadeci = $parametr;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Istifadeci Qeydiyyat Mail',
        );
    }
    public function content(): Content
    {
        return new Content(
            view: 'emails.istifadeci_qeydiyyat_mail',
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
