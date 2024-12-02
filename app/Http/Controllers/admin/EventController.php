<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Participant;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_event = Event::with('user')->where('user_id', Auth::user()->id)->get();
        return view('admin.event.index', compact('get_event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all()); 
        
        $this->validate($request, [
            'nama_event' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal' => 'required|date',
            'ttd' => 'nullable|string|max:255',
            'user_id' => 'required|string|max:255',
        ]);
        


        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $logoPath = $file->store('logos', 'public');
        } else {
            $logoPath = null;
        }

        Event::create([
            'nama_event' => $request->nama_event,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'deskripsi' => $request->deskripsi,
            'logo' => $logoPath,
            'tanggal' => $request->tanggal,
            'ttd' => $request->ttd,
            'user_id' => $request->user_id,
        ]);
        
        return redirect()->route('admin.event');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail_event = Event::with('User')->findOrFail($id);
        
        $participant = Participant::where('event_id', $id)->get();

        return view('admin.event.show', compact('detail_event','participant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('admin.event.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama_event' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal' => 'required|date',
            'ttd' => 'nullable|string|max:255',
            'user_id' => 'required|string|max:255',
        ]);
    
        $event = Event::findOrFail($id);
    
        if ($request->hasFile('logo')) {
            if ($event->logo) {
                Storage::disk('public')->delete($event->logo);
            }
            $file = $request->file('logo');
            $logoPath = $file->store('logos', 'public');
        } else {
            $logoPath = $event->logo;
        }
    
        $event->update([
            'nama_event' => $request->nama_event,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'deskripsi' => $request->deskripsi,
            'logo' => $logoPath,
            'tanggal' => $request->tanggal,
            'ttd' => $request->ttd,
            'user_id' => $request->user_id,
        ]);
    
        return redirect()->route('admin.event')->with('success', 'Event updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_event = Event::findOrFail($id);
        $delete_event->delete();
        return redirect()->route('admin.event');

    }
}
