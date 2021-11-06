<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class MessageCreatedEvent extends Event implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public string $message;

    /**
     * Create a new event instance.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        $this->message = $message;

    }

    public function broadcastOn()
    {
        return new Channel('test');
    }

    public function broadcastWith()
    {
        return [
            'data' => [
                'message'   =>  $this->message
            ]
        ];
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'test.message';
    }
}
