<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\Participant;

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
        return view('admin.index');
    }
}
