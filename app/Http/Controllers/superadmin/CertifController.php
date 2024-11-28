<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Certificate;
use App\Models\Event;
use Illuminate\Support\Str;


class CertifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.certificate.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, string $eventId)
    {
        $event = Event::findOrFail($eventId);
        $participants = $event->participants;
        
        if (!$participants || $participants->isEmpty()) {
            return redirect()->back()->with('error', 'No participants found for this event.');
        }

        foreach ($participants as $participant) {
             Certificate::create([
                'id' => Str::uuid()->toString(),
                'event_id' => $event->id,
                'participant_id' => $participant->id,
                'style' => 'style 1',
                'signature' => null,
            ]);
        }

        return redirect()->to(url("/superadmin/event/show/{$eventId}"))->with('success', 'Participants imported successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $certif = Certificate::where('participant_id', $id)->first();

        return view('superadmin.certificate.show', compact('certif'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
