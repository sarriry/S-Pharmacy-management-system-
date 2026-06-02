<?php

namespace App\Jobs;

use App\Notifications\WelcomeEmailNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class WelcomeEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
        //
    }


    public function handle()
    {
        $this->client->notify((new WelcomeEmailNotification));
    }
}
