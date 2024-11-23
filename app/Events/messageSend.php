<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSend implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The message being sent.
     *
     * @var string
     */
    public $message;
    public $additionalData;

    /**
     * Create a new event instance.
     *
     * @param string $message
     */
    public function __construct($message, $additionalData)
    {
        $this->message = $message;
        $this->additionalData = $additionalData;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('reverb'),
        ];
    }

    /**
     * Customize the event name for broadcasting.
     *
     * @return string
     */
    public function broadcastAs(): string
    {
        return 'message.sent';
    }
}
