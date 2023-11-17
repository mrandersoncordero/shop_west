<?php

namespace App\Http\Controllers;

use App\Mail\PaymentRegisterMail;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    //

    public function index()
    {
        if (Auth::user()->hasPermission(17, 'No tienes permisos para ver pagos')) {
            return view('admin.payment.index', [
                'payments' => Payment::all(),
            ]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|unique:payments,order_id',
            'bank_reference' => 'required|string|max:4',
            'file' => 'required|image|mimes:jpeg,png,jpg|max:1536',
        ]);
        $file = $request->file('file');
        $attempt = 1;
        do {
            // Generar un nombre de archivo único
            $fileName = time() . '-' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        
            // Comprobar si el archivo ya existe en el directorio
            $exists = Storage::disk('proof_of_payment')->exists($fileName);
        
            // Incrementar el intento
            $attempt++;
        
            // Si el archivo ya existe, genera un nuevo nombre de archivo
        } while ($exists && $attempt < 5); // Limitar el número de intentos para evitar bucles infinitos
        
        if ($exists) {
            // Si después de varios intentos no se encontró un nombre de archivo único, puedes manejar el error adecuadamente aquí.
            // Por ejemplo, mostrar un mensaje de error o lanzar una excepción.
            return redirect()->route('orders.index')->with('Intentalo de nuevo ' . $fileName);
        } else {
            // Si se encontró un nombre de archivo único, guárdalo en el disco
            Storage::disk('proof_of_payment')->put($fileName, file_get_contents($file));
        
            // Crear una nueva instancia de Payment con el nombre único del archivo
            $payment = new Payment([
                'user_id' => Auth::user()->id,
                'order_id' => $request->order_id,
                'bank_reference' => $request->bank_reference,
                'file' => $fileName,
            ]);
        
            $payment->save();
            $order = Order::find($request->order_id);
            $order->update([
                'status_id' => 4
            ]);

            Mail::to('acorderofigueroa7@gmail.com')->send(new PaymentRegisterMail(Auth::user(), $order));
        }

        return redirect()->route('order.index');
    }


}
