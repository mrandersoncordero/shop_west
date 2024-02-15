<?php

namespace App\Http\Controllers;

use App\Mail\ChangeOrderStatusMail;
use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Http\Controllers\CartController;
use App\Models\OrderStatus;
use App\Models\PaymentType;
use App\Models\Product;
use App\Models\ProductsOfOrder;
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
                'orders' => $orders,
                'order_status' => OrderStatus::all(),
            ]);
        }
    }

    public function show(Order $order)
    {
        if (Auth::user()->hasPermission(14, 'No tienes permisos para ver detalle de la orden de compra')) {
            return view('admin.order.show', [
                'order' => $order
            ]);
        }
    }

    public function edit(Order $order)
    {
        if (Auth::user()->hasPermission(14, 'No tienes permisos para ver detalle de la orden de compra')) {
            return view('admin.order.edit', [
                'order' => $order,
                'payment_type' => PaymentType::all(),
                'order_status' => OrderStatus::all(),
                'product_by_order' => ProductsOfOrder::all()->where('order_id', $order->id),
                'products' => Product::all(),
            ]);
        }
    }

    public function update(Request $request, Order $order) 
    {
        if (Auth::user()->hasPermission(14, 'No tienes permisos para ver detalle de la orden de compra')) {
            $request->validate([
                'payment_type' => 'required|string',
                'price_total' => 'regex:/^\d+(\.\d{1,2})?$/',
                'retreat' => 'string',
            ]);
            
            $order->update([
                'payment_type_id' => $request->payment_type,
                'price_total' => $request->price_total,
                'retreat' => $request->retreat,
            ]);
            $order->save();

            return redirect()->route('orders.edit', $order)->with('message', [
                'class' => 'alert--success',
                'title' => 'Orden  actualizada',
                'content' => "Orden actualizada correctamente"
            ]);
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


    public function addProduct(Request $request, Order $order)
    {

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
        
        $product = Product::find($request->product_id);
        $existingProduct = $order->order_products()->where('product_id', $request->product_id)->first();

        if ($existingProduct) {
            // Si el producto ya existe en la orden, actualiza la cantidad
            $existingProduct->update([
                'quantity' => $existingProduct->quantity + $request->quantity,
            ]);
    
            return redirect()->route('orders.edit', $order)->with('message', [
                'class' => 'alert--success',
                'title' => 'Orden  actualizada',
                'content' => "Cantidad actualizada correctamente correctamente"
            ]);
        } else {
            // Si el producto no existe en la orden, crea uno nuevo
            $product = Product::find($request->product_id);
    
            $newProduct = new ProductsOfOrder([
                'order_id' => $order->id,
                'product_id' => $request->input('product_id'),
                'quantity' => $request->input('quantity'),
                'type_of_sale' => $product->type_of_sale,
                'quantity_by_type_of_sale' => $product->quantity,
                'price' => $product->price,
            ]);
        
            // Asociar el nuevo producto con la orden
            $order->order_products()->save($newProduct);
        
            return redirect()->route('orders.edit', $order)->with('message', [
                'class' => 'alert--success',
                'title' => 'Orden  actualizada',
                'content' => "Prodcuto agregado correctamente"
            ]);
        }
    }
}
