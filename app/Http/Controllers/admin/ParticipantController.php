<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Participant;
use App\Imports\ParticipantsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TemplateExport;
use Illuminate\Support\Facades\Validator;



class ParticipantController extends Controller
{
    
    public function index()
    {
        $user = Participant::with('event')->where('id', 1)->first();

        return response()->json($user);
    }

    public function import_create(string $id){
        // dd($id);
        $eventID = $id;
        return view('admin.participant.add', compact('eventID')); 
    }


    public function import_store(Request $request)
    {
        $eventId = $request->event_id;
        Excel::import(new ParticipantsImport($eventId), $request->file('file'));

        return redirect()->to(url("/admin/event/show/{$eventId}"))->with('success', 'Participants imported successfully.');
    }

    public function export_template()
    {
        return Excel::download(new TemplateExport, 'template.xlsx');
    }

    public function destroy_all(string $id){
        $participant = Participant::where('event_id', $id)->delete();
        return redirect()->to(url("/admin/event/show/{$id}"));
    }


    public function edit($id)
    {
        $participant = Participant::findOrFail($id);

        return view('admin.participant.edit', compact('participant'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|numeric',
        ]);
    
        $participant = Participant::findOrFail($id);
        $eventId = $participant->event_id;

        $participant->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->to(url("/admin/event/show/{$eventId}"));
    }

    
    public function destroy($id)
    {
        $participant = Participant::findOrFail($id);
        $eventId = $participant->event_id;
        $participant->delete();
        return redirect()->to(url("/admin/event/show/{$eventId}"));

    }
}
