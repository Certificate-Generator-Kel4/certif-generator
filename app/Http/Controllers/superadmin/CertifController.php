<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Certificate;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Mail\CertificateMail;
use Illuminate\Support\Facades\Mail;


class CertifController extends Controller
{
    
    
    public function index()
    {
        //
    }

    public function create()
    {
        return view('superadmin.certificate.add');
    }

    public function store(Request $request, string $eventId)
    {
        $event = Event::findOrFail($eventId);
        $participants = $event->participants;
    
        if (!$participants || $participants->isEmpty()) {
            \Log::error("No participants found for event ID: {$eventId}");
            return redirect()->back()->with('error', 'No participants found for this event.');
        }
    
        foreach ($participants as $participant) {
            $certificate = Certificate::create([
                'id' => Str::uuid()->toString(),
                'event_id' => $event->id,
                'participant_id' => $participant->id,
                'style' => 'style 1',
                'signature' => null,
            ]);
    
            // Send email with the certificate PDF attached
            Mail::to($participant->email)->send(new CertificateMail($participant, $certificate));
        }
    
        return redirect()->to(url("/superadmin/event/show/{$eventId}"))
            ->with('success', 'Participants imported and emails sent successfully.');
    }
    
    public function show($id)
    {
        $certif = Certificate::where('participant_id', $id)->first();

        return view('superadmin.certificate.show', compact('certif'));
    }

    public function indexSearch(){
        return view('superadmin.search-certif.index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $results = Certificate::where('id', $search)->get();
        
        if ($results->isEmpty()) {
            return view('superadmin.search-certif.unverified', compact('search')) ;
        }
    
        return view('superadmin.search-certif.verified', compact('results'));
    }


    public function pdf(string $id)
    {
        $certif = Certificate::where('participant_id', $id)->first();
        $participant = Participant::where('id', $id)->first();
        if (!$certif) {
            abort(404, 'Certificate not found.');
        }
    
        $nama = $certif->participant->nama;
        
        $pdf = PDF::loadView('superadmin.certificate.certif_pdf', compact('certif', 'participant'));
        $pdf->setPaper('A4', 'landscape');
        
        return $pdf->stream("certif_$nama.pdf");
    }
}
