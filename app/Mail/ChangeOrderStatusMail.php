<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ChangeOrderStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct( Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->order->status_id == 1) {
            return $this->subject("Su pedido Nº{$this->order->id} ha sido aprovado") // Define el asunto del correo
            ->view('mails.change_order_status'); // Define la vista del correo
        }elseif ($this->order->status_id == 2) {
            return $this->subject("Su pedido Nº{$this->order->id} esta en proceso") // Define el asunto del correo
            ->view('mails.change_order_status'); // Define la vista del correo
        }else{
            return $this->subject("Su pedido Nº{$this->order->id} ha sido rechazado") // Define el asunto del correo
            ->view('mails.change_order_status'); // Define la vista del correo
        }
    }
}
