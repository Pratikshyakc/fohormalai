<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MunicipalityNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $latitude;
    public $longitude;
    public $user;
    public $image;
    /**
     * Create a new message instance.
     */
    public function __construct($latitude, $longitude, $user,$image)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->user = $user;
        $this->image = $image;
    }

    public function build()
    {
        return $this->subject('Garbage Alert Notification')
            ->view('notify_municipality')
            ->with([
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'user' => $this->user,
                'image' => $this->image,
            ]);
    }
}
//    public function envelope(): Envelope
//    {
//        return new Envelope(
//            subject: 'Municipality Notification',
//        );
//    }
//
//    /**
//     * Get the message content definition.
//     */
//    public function content(): Content
//    {
//        return new Content(
//            view: 'view.name',
//        );
//    }
//
//    /**
//     * Get the attachments for the message.
//     *
//     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
//     */
//    public function attachments(): array
//    {
//        return [];
//    }
//}
