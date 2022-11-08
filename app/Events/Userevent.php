<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Userevent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    //  public $user_id;
    public $pnid;
    public $typeleave;
    public $user_id;
    //  public $typeleave;
    //  public $user_fullname;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($pnid,$typeleave,$user_id)
    {
        //
            $this->pnid = $pnid;
            $this->typeleave=$typeleave;
            $this->user_id=$user_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new PrivateChannel('channel-user');
        return new Channel('channel-user');
    }
    public function broadcastAs()
    {
        return 'event-user';
    }
}
