<?php

namespace App\Http\Controllers;

use App\Mail\CatalogMail;
use App\Models\InterestedClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InterestedClientController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'accept' => 'boolean',
        ]);

        $clientData = $request->all();

        // Verificar si el correo ya existe
        $existingClient = InterestedClient::where('email', $request->input('email'))->first();
        
        if ($existingClient) {
            // Enviar correo si el cliente ya existe
            // Puedes personalizar esta lógica según tus necesidades
            // Por ejemplo, puedes enviar un recordatorio o una oferta especial.
            Mail::to($existingClient->email)->send(new CatalogMail($existingClient, $clientData));
        } else {
            // Crear un nuevo cliente solo si no existe
            $interestedClient = InterestedClient::create($request->all());

            // Envía el correo si deseas hacerlo también para nuevos clientes
            Mail::to($interestedClient->email)->send(new CatalogMail($interestedClient, $clientData));
        }

        return redirect()->back()->with('message', [
            'class' => 'alert--success',
            'title' => 'Envio de catalogo',
            'content' => "Se ha enviado el catalogo al correo proporcionado"
        ]);
    }

}
