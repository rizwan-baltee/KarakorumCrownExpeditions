<?php

namespace App\Mail;

use App\Models\BookTour;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public BookTour $booking)
    {
    }

    public function envelope(): Envelope
    {
        $subject = $this->booking->isInquiry()
            ? 'Thank you for your inquiry – Karakorum Crown Expeditions'
            : 'Booking received – Karakorum Crown Expeditions';

        return new Envelope(subject: $subject);
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking-confirmation',
            with: [
                'booking' => $this->booking,
                'trek' => $this->booking->trendingTrek,
            ]
        );
    }
}
