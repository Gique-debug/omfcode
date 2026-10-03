<?php

namespace App\Mail;

use App\Models\QuoteRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuoteResponseMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public QuoteRequest $quoteRequest,
        public string $replyText
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Réponse à votre demande de devis - OMF',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.quotes.reply',
        );
    }
}
