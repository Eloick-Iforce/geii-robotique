<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Factures extends Mailable
{
    use Queueable, SerializesModels;

    private string $team;
    private string $billingAddress;
    private string $user;

    /**
     * Create a new message instance.
     */
    public function __construct($team, $billingAddress, $user)
    {
        $this->team = $team;
        $this->billingAddress = $billingAddress;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Votre devis pour la compétition',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'invoices.mail',
            with: [
                'team' => $this->team,
                'billingAddress' => $this->billingAddress,
                'user' => $this->user,
            ],
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
