<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CompanyContact extends Mailable
{
    use Queueable, SerializesModels;

    public $clientData;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct($clientData)
    {
        $this->clientData = $clientData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->clientData['subject'])
                ->view('mails.companyContact'); // Define la vista del correo
    }
}
