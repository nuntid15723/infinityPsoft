<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Notification;
use App\Notifications\OffersNotification;
use Pusher\Pusher;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('product');
    }
    public function sendOfferNotification()
    {
        if (auth()->user()) {
        $user = User::first();

        Notification::send(auth()->user(), new OffersNotification($user));

        dd($user);
        }
    }
    // public function notification()
    // {
    //     $options = array(
    //         'cluster' => env('ap1'),
    //         'encrypted' => true
    //     );
    //     $pusher = new Pusher(
    //         env('PUSHER_APP_KEY'),
    //         env('PUSHER_APP_SECRET'),
    //         env('PUSHER_APP_ID'),
    //         $options
    //     );

    //     $data['message'] = 'Hello XpertPhp';
    //     $pusher->trigger('notify-channel', 'App\\Events\\Notify', $data);
    // }
}
