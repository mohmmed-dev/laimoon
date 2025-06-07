<?php

namespace App\Listeners;

use App\Events\Notifications;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Notifications $event): void
    {
        $event->user->notifications()->create([
            'message' => $event->message,
        ]);
    }
}
