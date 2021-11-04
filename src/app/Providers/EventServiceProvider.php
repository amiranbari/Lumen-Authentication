<?php

namespace App\Providers;

use App\Events\ExampleEvent;
use App\Events\UpdateUserEvent;
use App\Listeners\ExampleListener;
use App\Listeners\UpdateUserListener;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ExampleEvent::class => [
            ExampleListener::class,
        ],

        UpdateUserEvent::class => [
            UpdateUserListener::class
        ]
    ];
}
