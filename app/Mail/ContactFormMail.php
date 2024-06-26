<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;
    public $formData;

    /**
     * Create a new message instance.
     */
    public function __construct(array $formData)
    {
        $this->formData = $formData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Contact Form Submission')
                    ->view('emails.contact_form')
                    ->with([
                        'name' => $this->formData['name'],
                        'email' => $this->formData['email'],
                        'message' => $this->formData['message'],
                        'whatsappLink' => $this->generateWhatsappLink($this->formData['phone']),
                    ]);
    }

    /**
     * Generate WhatsApp link from phone number
     *
     * @param string $phoneNumber
     * @return string
     */
    private function generateWhatsappLink($phoneNumber)
    {
        return 'https://wa.me/' . preg_replace('/\D/', '', $phoneNumber);
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Form Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
