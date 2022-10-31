<?php

namespace App\Http\Controllers;

//use Notification;
use App\Models\User;
use App\Notifications\SendEmailNotidicaction;
use Illuminate\Support\Facades\Notification;

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
        $postNotifications = auth()->user()->unreadNotifications;
        if (auth()->user()->admin) {
            return view('dashboard', compact('postNotifications'));
        }
        return view('welcome', compact('postNotifications'));
    }
}
