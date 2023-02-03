<?php

namespace App\Http\Controllers;

use App\Models\Natifact;
use App\Models\User;
use App\Notifications\UserFollowNotification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function notify()
    {
        if(auth()->user()){
            $user = User::whereId(4)->all();

            auth()->user()->notify(new UserFollowNotification($user));
        }

    }
}
