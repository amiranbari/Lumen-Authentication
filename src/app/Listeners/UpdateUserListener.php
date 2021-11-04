<?php

namespace App\Listeners;

use App\Events\UpdateUserEvent;
use App\Jobs\UserLoginJob;
use Carbon\Carbon;
use Illuminate\Support\Facades\Queue;

class UpdateUserListener
{


    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }


    public function handle(UpdateUserEvent $event)
    {
        $date = Carbon::now()->addSeconds(20);

        Queue::later($date, (new UserLoginJob($event->getUsername(), $event->getPassword(), $event->getUser())));

    }
}
