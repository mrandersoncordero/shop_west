<?php

namespace App\Http\Controllers;

use App\Mail\CatalogMail;
use App\Models\Product;
use App\Models\InterestedClient;
use App\Mail\ProductSheet;
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

        switch ($request->input('name_mail')) {
            case 'catalog':
                if ($existingClient) {
                    // Enviar correo si el cliente ya existe
                    // Puedes personalizar esta lógica según tus necesidades
                    // Por ejemplo, puedes enviar un recordatorio o una oferta especial.
                    return $this->downloadCatalog();
                } else {
                    // Crear un nuevo cliente solo si no existe
                    $interestedClient = InterestedClient::create($request->all());

                    // Envía el correo si deseas hacerlo también para nuevos clientes
                    return $this->downloadCatalog();
                }
                break;

            case 'sheet':
                // Obtenemos los datos del producto
                $product = Product::where('id', $request->input('product'))->first();

                if ($existingClient) {
                    // Enviar correo si el cliente ya existe
                    // Puedes personalizar esta lógica según tus necesidades
                    // Por ejemplo, puedes enviar un recordatorio o una oferta especial.
                    Mail::to($existingClient->email)->send(new ProductSheet($product, $clientData));
                } else {
                    // Crear un nuevo cliente solo si no existe
                    $interestedClient = InterestedClient::create($request->all());

                    // Envía el correo si deseas hacerlo también para nuevos clientes
                    Mail::to($interestedClient->email)->send(new ProductSheet($product, $clientData));
                }
                break;
            default:
                return redirect()->back()->with('message', [
                    'class' => 'alert--danger',
                    'title' => 'Envio de catalogo',
                    'content' => "Deja de joder"
                ]);
                break;
        }

        return redirect()->back()->with('message', [
            'class' => 'alert--success',
            'title' => 'Envio de catalogo',
            'content' => "Se ha enviado el catalogo al correo proporcionado"
        ]);
    }

    public function downloadCatalog()
    {
        $catalogPath = public_path('download_datainfo/catalog.pdf');

        if (file_exists($catalogPath)) {
            return response()->json(['url' => asset('download_datainfo/catalog.pdf'), 'message' => 'El catálogo se envió correctamente']);
        } else {
            return response()->json(['error' => 'El catálogo no está disponible en este momento.'], 404);
        }
    }
}
