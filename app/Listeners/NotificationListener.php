<?php

namespace App\Listeners;

use App\Events\NotificationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationListener
{
    /**
     * Handle the event.
     *
     * @param  NotificationEvent  $event
     * @return void
     */
    public function handle(NotificationEvent $event)
    {
        // @TODO push NotificationEvent to heroku
    }
}
