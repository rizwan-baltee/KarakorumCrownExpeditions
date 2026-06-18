<?php

namespace App\Mail;

use App\Models\BookTour;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public BookTour $booking)
    {
    }

    public function envelope(): Envelope
    {
        $subject = $this->booking->isInquiry()
            ? 'New Inquiry: ' . $this->booking->name
            : 'New Booking Request: ' . $this->booking->name;

        return new Envelope(subject: $subject);
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking-received',
            with: [
                'booking' => $this->booking,
                'trek' => $this->booking->trendingTrek,
            ]
        );
    }
}
