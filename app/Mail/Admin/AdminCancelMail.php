<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminCancelMail extends Mailable
{
    use Queueable, SerializesModels;
    public $ref;
    public $mailData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ref, $mailData)
    {
        $this->ref = $ref;
        $this->mailData = $mailData;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Booking cancelled Ref. '.$this->ref,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.adminCancel',
            with: ['ref' => $this->ref,'mailData' => $this->mailData],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
