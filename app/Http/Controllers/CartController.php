<?php

namespace App\Http\Controllers;

use App\Mail\CreateOrderMail;
use App\Models\Category;
use App\Models\Order;
use App\Models\PaymentType;
use App\Models\Product;
use App\Models\ProductsOfOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {
            $cart = session('cart', []);
            $products = array();
            if ($cart) {
                
                foreach ($cart as $key => $value) {
                    $product = Product::find($value['product_id']);
    
                    if (!$product) {
                        echo 'error';
                    }else{
                        $products[$key] = [
                            'product' => $product,
                            'quantity' => $value['quantity'],
                        ];
                    }
                }
                //dd($products);
                return view('cart.index', [
                    'products' => $products,
                    'categories' => Category::all(),
                    'payment_types' => PaymentType::all(),
                    'cart_products' => $this->show_products()
                ]);
            }else{
                return view('cart.index', [
                    'products' => '',
                    'categories' => Category::all(),
                    'payment_types' => PaymentType::all()
                ]);
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function addToCart(Request $request, $productId) 
    {
        if (Auth::check()) {
            $product = Product::find($productId);
            // Obtén el carrito actual desde la sesión
            $cart = session('cart', []);

            if ($cart == "") {
                $cart[] = [
                    'product_id' => $product->id,
                    'quantity' => 1,
                ];
            }else{
                $productFound = false;

                foreach ($cart as &$product_cart) { // Usar "&" para modificar la referencia original
                    if ($product_cart['product_id'] == $productId) {
                        $product_cart['quantity'] += 1;
                        $productFound = true;
                        break; // Importante: detener el bucle si el producto se encontró y actualizó
                    }
                }
            
                // Si el producto no se encontró en el bucle, agrégalo al carrito
                if (!$productFound) {
                    $cart[] = [
                        'product_id' => $product->id,
                        'quantity' => 1,
                    ];
                }
            }

            session(['cart' => $cart]);
            return back()->with('message', [
                'class' => 'border_color-success',
                'title' => 'Producto agregado al carrito',
                'content' => 'El producto "'.mb_strtolower($product->name, 'UTF-8').'" ha sido agregado satisfactoriamente.'
            ]);
        } else {
            // El usuario no está autenticado, redirige a la página de inicio de sesión
            return redirect()->route('login');
        }
    }

    public function editProductCart(Request $request)
    {
        if (Auth::check()) {
            $product_id = $request->product_id;
            $quantity = $request->quantity;
            
            // Obtén el carrito actual desde la sesión
            $cart = session('cart', []);

            foreach ($cart as &$value) {
                if ($value['product_id'] == $product_id) {
                    $value['quantity'] = $quantity;
                }
            }

            session(['cart' => $cart]);
            return back()->with('message', [
                'class' => 'border_color-update',
                'title' => 'Modificacion',
                'content' => 'La cantidad del producto se ha actualizado.'
            ]);
        }else{
            // El usuario no está autenticado, redirige a la página de inicio de sesión
            return redirect()->route('login');  
        }
    }

    public function removeFromCart($product)
    {
        if (Auth::check()) {
            // Obtén el ID del producto a eliminar a partir de la URL
            $productId = $product;
    
            // Obtén el carrito actual desde la sesión
            $cart = session('cart', []);
    
            // Realiza la lógica para eliminar el producto del carrito
            foreach ($cart as $key => $item) {
                if ($item['product_id'] == $productId) {
                    unset($cart[$key]); // Elimina el elemento del carrito
                }
            }

            // Acctualiza el carrito en la sesión
            session(['cart' => $cart]);
            return back()->with('message', [
                'class' => 'border_color-destroy',
                'title' => 'Producto removido.',
                'content' => 'El producto ha sido removido sin problemas'
            ]);
        } else {
            // El usuario no está autenticado, redirige a la página de inicio de sesión
            return redirect()->route('login');
        }
    }

    public function clearCart()
    {
        if (Auth::check()) {
            session()->forget('cart');
            
            // Redirige a la página del carrito vacío u a donde desees
            return back()->with('message', [
                'class' => 'border_color-clear',
                'title' => 'Vaciar carrito.',
                'content' => 'El carrito ha sido vaciado correctamente.'
            ]);
        } else {
            // El usuario no está autenticado, redirige a la página de inicio de sesión
            return redirect()->route('login');
        }
    }
    
    public function checkout(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'payment_type_id' => 'required|integer',
                'price_total' => 'required',
            ]);
            // Obtén el carrito actual desde la sesión
            $cart = session('cart', []);
            // Obtener el usuario autenticado
            $user = Auth::user();

            $order = new Order([
                'user_id' => $user->id,
                'is_active' => 1,
                'payment_type_id' => $request->payment_type_id,
                'status_id' => 2,
                'price_total' => $request->price_total
            ]);
            $order->save();

            foreach ($cart as $key => $value) {
                $products_of_order = new ProductsOfOrder([
                    'order_id' => $order->id,
                    'product_id' => $value['product_id'],
                    'quantity' => $value['quantity'],
                ]);

                $products_of_order->save();
            }
            
            session()->forget('cart');
            
            Mail::to('acorderofigueroa7@gmail.com')->send(new CreateOrderMail($user, $order));
            
            
            return back()->with('message', [
                'class' => 'border_color-success',
                'title' => 'Pedido creado con exito',
                'content' => 'Nuestros administradores revisaran tu pedido.'
            ]);
        }else{
            return redirect()->route('login');
        }
    }

    public function show_products()
    {
        $products = array();
        if (Auth::check()) {
            $cart = session('cart', []);
            if ($cart) {
                
                foreach ($cart as $key => $value) {
                    $product = Product::find($value['product_id']);
    
                    if (!$product) {
                        echo 'error';
                    }else{
                        $products[$key] = [
                            'product' => $product,
                            'quantity' => $value['quantity'],
                        ];
                    }
                }
                //dd($products);
                return $products;
            }else{
                return $products;
            }
        }else{
            return $products;
        }
    }
}
