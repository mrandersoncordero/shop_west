<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\CompanyContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function send_email(Request $request)
    {
        $request->validate([
            'complete_name' => 'nullable|string',
            'zone' => 'nullable|string',
            'email' => 'required|email',
            'phone_number' => 'nullable|regex:/^[0-9]+$/|max:15', // Validación de solo números y máximo 15 caracteres
            'subject' => 'nullable|string',
            'comment' => 'nullable|string|max:255', // Limitar a 255 caracteres
        ]);

        $clientData = $request->all();

        // Dirección de correo electrónico de la empresa
        $companyEmail = 'ventasproductosoccidente@gmail.com';

        // Enviar correo a la empresa
        Mail::to($companyEmail)
            ->send(new CompanyContact($clientData));

        // Enviar correo a la empresa
        Mail::to($companyEmail)
            ->send(new Contact($clientData, $companyEmail));

        return redirect()->back()->with('message', [
            'class' => 'alert--success', // Cambiado a éxito para indicar que el correo se envió correctamente
            'title' => 'Envio de correo de contacto',
            'content' => 'El correo se envió correctamente. Pronto nos pondremos en contacto contigo.',
        ]);
    }
}
