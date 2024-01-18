<?php

namespace App\Mail;

use App\Models\InterestedClient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CatalogMail extends Mailable
{
    use Queueable, SerializesModels;

    public $interestedClient;
    public $clientData;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct( InterestedClient $interestedClient, $clientData)
    {
        $this->interestedClient = $interestedClient;
        $this->clientData = $clientData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->subject("Catálogo de Productos") // Define el asunto del correo
                ->to($this->interestedClient->email) 
                ->view('mails.catalog_mail'); // Define la vista del correo
        
    }
}
