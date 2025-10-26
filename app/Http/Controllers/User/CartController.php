<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Add product to cart
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);

        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    // Remove product from cart
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    // Update quantity (increment/decrement)
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->product_id;
        $quantity = $request->quantity;

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            if($cart[$id]['quantity'] <= 0) {
                unset($cart[$id]);
            }
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Cart updated!');
    }

    // Checkout page
    public function checkout()
    {
        $cart = session()->get('cart', []);
        if(!$cart) return redirect()->back()->with('error', 'Cart is empty!');
        return view('account.checkout', compact('cart'));
    }
}
