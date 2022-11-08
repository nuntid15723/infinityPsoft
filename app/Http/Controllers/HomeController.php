<?php

namespace App\Http\Controllers;

use App\Events\Adminevent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function sender()
    {
        $user_id = request()->user_id;
        $emid = request()->emid;
        // event(new Adminevent($user_id, $emid));
        return back();
    }
}
