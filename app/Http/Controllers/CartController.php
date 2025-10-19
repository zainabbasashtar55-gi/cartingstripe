<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Orders;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class CartController extends Controller
{
    public function addToCart($id) {
        $product = Product::find($id);

        $cart = session('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                "name"        => $product->name,
                "price"       => $product->price,
                "quantity"    => 1,
                "image"       => $product->image,
                "description" => $product->description
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function cart() {
        return view('cart');   
    } 

    public function removeFromCart($id) {
        $cart = session('cart', []);
    
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
    
        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }

    public function order(Request $request)
    {
        $cart = session('cart', []);
        $totalAmount = 0;

        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

      
        foreach ($cart as $details) {
            $totalAmount += $details['price'] * $details['quantity'];
        }

       
        $order = Orders::create([
            'user_id' => auth()->id(),
            'amount'  => $totalAmount,
            'status'  => '0', 
        ]);

       
        foreach ($cart as $id => $details) {
            OrderProduct::create([
                'order_id'   => $order->id,
                'product_id' => $id,
                'quantity'   => $details['quantity'],
                'price'      => $details['price'],
            ]);
        }

    
        Stripe::setApiKey(env('STRIPE_SECRET'));

      
        $lineItems = [];
        foreach ($cart as $id => $details) {
            $lineItems[] = [
                'price_data' => [
                    'currency'     => 'usd', 
                    'unit_amount'  => $details['price'] * 100, 
                    'product_data' => [
                        'name'        => $details['name'],
                        'description' => $details['description'] ?? '',
                    ],
                ],
                'quantity' => $details['quantity'],
            ];
        }

       
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items'           => $lineItems,
            'mode'                 => 'payment',
            'success_url'          => route('checkout.success', ['order' => $order->id]),
            'cancel_url'           => route('checkout.cancel', ['order' => $order->id]),
        ]);

        
        session()->forget('cart');

        
        return redirect($session->url);
    }
}
