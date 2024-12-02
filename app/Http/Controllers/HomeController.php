<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\Participant;
use Illuminate\Support\Facades\Auth;

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

    function superadmin(){
        $event = Event::count();
        $user = User::count();
        $participant = Participant::count();
        return view('superadmin.index', compact('event','user','participant'));
    }

    function admin(){
        $eventId = Event::where('user_id', Auth::user()->id)->pluck('id');
        $event = Event::where('user_id', Auth::user()->id)->count();
        $participant = Participant::whereIn('event_id', $eventId)->count();
        return view('admin.index',compact('event', 'participant'));
    }
}
