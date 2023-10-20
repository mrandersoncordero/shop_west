<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductsOfOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                ]);
            }else{
                return view('cart.index', [
                    'products' => '',
                    'categories' => Category::all(),
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
            return back()->with('success', 'Producto agregado al carrito');
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
            return back()->with('success', 'Producto actualizado en el carrito');
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
    
            return redirect()->route('cart.index'); // Redirige de nuevo a la página del carrito
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
            return back()->with('success', 'Carrito vaciado correctamente');
        } else {
            // El usuario no está autenticado, redirige a la página de inicio de sesión
            return redirect()->route('login');
        }
    }
    
    public function checkout()
    {
        if (Auth::check()) {
            // Obtén el carrito actual desde la sesión
            $cart = session('cart', []);
            // Obtener el usuario autenticado
            $user = Auth::user();

            $order = new Order([
                'user_id' => $user->id,
                'is_active' => 1,
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

            return redirect()->route('index')->with('success', 'Orden creada');
        }else{
            return redirect()->route('login');
        }
    }
}
