<?php

namespace App\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use App\Models\Certificate;
use App\Models\Participant;
use Illuminate\Contracts\Queue\ShouldQueue;

class CertificateMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $participant;
    public $certificate;

    // Constructor to accept participant and certificate
    public function __construct(Participant $participant, Certificate $certificate)
    {
        $this->participant = $participant;
        $this->certificate = $certificate;
    }

    // Build the message
    public function build()
    {
        // Generate the PDF
        $pdf = Pdf::loadView('superadmin.certificate.certif_pdf', [
            'participant' => $this->participant,
            'certificate' => $this->certificate,
        ]);
        $pdf->setPaper('A4', 'landscape');
        
        
        return $this->view('email.certificate')
                    ->subject('Your Event Certificate')
                    ->attachData($pdf->output(), "certificate_{$this->participant->nama}.pdf", [
                        'mime' => 'application/pdf',
                    ]);
    }
}