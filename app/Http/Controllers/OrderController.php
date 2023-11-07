<?php

namespace App\Http\Controllers;

use App\Mail\ChangeOrderStatusMail;
use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    //
    public function view_index()
    {
        $user = Auth::user();

        $orders_by_user = Order::all()->where('user_id', $user->id);

        return view('order.index', [
            'orders_by_user' => $orders_by_user,
            'categories' => Category::all(),
        ]);
    }

    public function view_edit(Order $order)
    {
        $isset_payment = Payment::all()->where('order_id', $order->id);
        return view('order.edit', [
            'order' => $order,
            'categories' => Category::all(),
            'isset_payment' => $isset_payment,
        ]);
    }

    public function index()
    {
        $orders = Order::all();

        return view('admin.order.index', [
            'orders' => $orders
        ]);
    }

    public function edit(Order $order)
    {

        return view('admin.order.edit', [
            'order' => $order
        ]);
    }

    public function change_status_order(Request $request, Order $order)
    {
        $order->update([
            'status_id' => $request->status_id,
        ]);
        
        Mail::to($order->user->email)->send(new ChangeOrderStatusMail($order));

        return redirect()->route('orders.index');
    }
}
