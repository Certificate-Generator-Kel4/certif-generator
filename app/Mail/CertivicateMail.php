<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CertificateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('emails.certificate')
                    ->subject('Your Certificate of Achievement')
                    ->attach(storage_path('app/public/' . $this->data['certificate_path']))
                    ->with([
                        'name' => $this->data['name'],
                        'achievement' => $this->data['achievement'],
                    ]);
    }
}
