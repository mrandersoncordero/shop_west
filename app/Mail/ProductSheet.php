<?php

namespace App\Mail;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProductSheet extends Mailable
{
    use Queueable, SerializesModels;

    public $product;
    public $clientData;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct(Product $product, $clientData)
    {
        $this->product = $product;
        $this->clientData = $clientData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject("Ficha del producto {$this->product->name}") // Define el asunto del correo
            ->view('mails.sheet_product_mail'); // Define la vista del correo

    }
}
