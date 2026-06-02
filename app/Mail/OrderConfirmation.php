<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    protected $order;
    protected $notifiable;

    public function __construct($order, $notifiable)
    {
        $this->order = $order;
        $this->notifiable = $notifiable;
    }


    public function envelope()
    {
        return new Envelope(
            subject: 'Order Confirmation',
        );
    }

    public function content()
    {
        return new Content(
            markdown: 'mails.ConfirmOrder',
            with: [
                'order' => $this->order,
                'notifiable' => $this->notifiable
            ],
        );
    }


    public function attachments()
    {
        return [];
    }
}
