<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('order.edit', [
            'order' => $order,
            'categories' => Category::all(),
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

        return redirect()->route('orders.index');
    }
}
