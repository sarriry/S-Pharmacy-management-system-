<?php

namespace App\Notifications;

use App\Mail\OrderConfirmation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Action;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderConfirmationNotification extends Notification implements ShouldQueue
{
    use Queueable;
    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        return (new OrderConfirmation($this->order, $notifiable))->to($notifiable->email);
    }





    
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
