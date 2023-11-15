<?php

namespace App\Http\Controllers;

use App\Mail\ChangeOrderStatusMail;
use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Http\Controllers\CartController;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    //
    public function view_index()
    {
        $user = Auth::user();
        $cart = new CartController();

        $orders_by_user = Order::all()->where('user_id', $user->id);

        return view('order.index', [
            'orders_by_user' => $orders_by_user,
            'categories' => Category::all(),
            'cart_products' => $cart->show_products()
        ]);
    }

    public function view_edit(Order $order)
    {
        $cart = new CartController();
        $isset_payment = Payment::all()->where('order_id', $order->id);
        return view('order.edit', [
            'order' => $order,
            'categories' => Category::all(),
            'isset_payment' => $isset_payment,
            'cart_products' => $cart->show_products()
        ]);
    }

    public function index()
    {
        if (Auth::user()->hasPermission(13, 'No tienes permisos para ver ordenes de compra')) {
            $orders = Order::all();

            return view('admin.order.index', [
                'orders' => $orders
            ]);
        }
    }

    public function edit(Order $order)
    {
        if (Auth::user()->hasPermission(14, 'No tienes permisos para ver detalle de la orden de compra')) {
            return view('admin.order.edit', [
                'order' => $order
            ]);
        }
    }

    public function change_status_order(Request $request, Order $order)
    {
        if (Auth::user()->hasPermission(16, 'No tienes permisos para cambiar estado de la orden de compra')) {
            $order->update([
                'status_id' => $request->status_id,
            ]);
            
            Mail::to($order->user->email)->send(new ChangeOrderStatusMail($order));

            return redirect()->route('orders.index');
        }
    }

    public function destroy(Order $order)
    {
        if (Auth::user()->hasPermission(15, 'No tienes permisos para eliminar orden de compra')) {
            try {
                $order->delete();

                return back()->with('message', [
                    'class' => 'alert--success',
                    'title' => 'Orden eliminada correctamente',
                    'content' => "Pedido #{$order->id} eliminado correctamente"
                ]);
            } catch (QueryException $e) {
                $errorCode = $e->errorInfo[1];

                if ($errorCode == 1451) {
                    return back()->with('message', [
                        'class' => 'alert--danger',
                        'title' => 'Error',
                        'content' => "No se puede eliminar el pedido #{$order->id} por que posee valores asociados"
                    ]);
                }
            }
        }
    }
}
