<?php

namespace App\Events;

use App\Models\Department;
use App\Models\Leave;
use App\Models\Salary;
use FontLib\Table\Type\name;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class Adminevent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $typeleave;
    public $user_fullname;
    public $time;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($typeleave, $user_fullname,$time)

    {
        $this->user_fullname = $user_fullname;
        $this->typeleave = $typeleave;
        $this->time=$time;
        // dd($data);
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('channel-admin');
    }

    public function broadcastAs()
    {
        return 'event-admin';
    }
}
