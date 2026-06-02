<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InactiveUserNotification extends Notification
{
    use Queueable;


    public function __construct()
    {
        //
    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Our website misses you')
            ->greeting('Our Dear user ' . $notifiable->name . ' We miss you!')
            ->line('You have not logged in to our website in a long time.')
            ->line('please pay us a visit :) .');
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
