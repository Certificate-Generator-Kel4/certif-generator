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
        $templates = Certificate::all(); 
        return view('superadmin.certificate.index', compact('templates'));
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $template = Certificate::findOrFail($id);
        return view('superadmin.certificate.edit', compact('template'));
    }
    public function indexSearch(){
        return view('superadmin.search-certif.index');
    }

    public function search(Request $request)
    {
        
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'background_url' => 'required|url',
        'style' => 'nullable|string|max:255',
    ]);

    $template = Certificate::findOrFail($id);
    $template->update([
        'title' => $validated['title'],
        'background_url' => $validated['background_url'],
        'style' => $validated['style'] ?? $template->style,
    ]);

    return redirect()->route('certificate.index')->with('success', 'Template updated successfully.');
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
    public function template()
{
    $templates = [
        ['id' => 1, 'name' => 'Template 1', 'preview' => asset('sertif/1.jpeg'),],
        ['id' => 2, 'name' => 'Template 2', 'preview' => asset('sertif/1.jpeg'),],
    ];

    return view('superadmin.certificate.template', compact('templates'));
}
public function generate($template_id)
{
    // Ambil template berdasarkan ID yang dipilih
    $template = Certificate::findOrFail($template_id);

    // Tampilkan halaman generate sertifikat dengan data template yang dipilih
    return view('superadmin.certificate.generate', compact('template'));
}


    
}
