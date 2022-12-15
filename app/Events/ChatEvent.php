<?php

namespace App\Events;

use App\Models\Message;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ChatEvent implements ShouldBroadcastNow
{
    use SerializesModels;

    public $message;

    private $channelFmt = 'chat.{receiver}';

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel($this->buildPrivateChannel($this->message->msg_to));
    }

    /**
     * buildPrivateChannel 创建 chat channel 名
     * @param $to 接收用户 ID
     * @return string
     */
    private function buildPrivateChannel(int $to)
    {
        return strtr($this->channelFmt, [
            '{receiver}' => $to,
        ]);
    }
}
