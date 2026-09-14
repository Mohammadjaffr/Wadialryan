<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RfqReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $rfq;

    public function __construct($rfq)
    {
        $this->rfq = $rfq;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Quote Request from ' . $this->rfq->company,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.rfq',
        );
    }

    public function attachments(): array
    {
        $attachments = [];
        if ($this->rfq->attachment && \Illuminate\Support\Facades\Storage::disk('local')->exists($this->rfq->attachment)) {
            $attachments[] = \Illuminate\Mail\Mailables\Attachment::fromStorageDisk('local', $this->rfq->attachment);
        }
        return $attachments;
    }
}
