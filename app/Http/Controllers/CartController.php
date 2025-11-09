<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Show Cart Page
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Add item to cart
    public function add(Request $request)
    {
        $cart = Session::get('cart', []);

        $id = $request->id;
        $name = $request->name;
        $price = $request->price;
        $quantity = $request->quantity;

        // If product already in cart, update quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity
            ];
        }

        Session::put('cart', $cart);
        return response()->json($cart);
    }

    // Update quantity
    public function update(Request $request)
    {
        $cart = Session::get('cart', []);
        $id = $request->id;
        $quantity = $request->quantity;

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            $cart[$id]['price'] = $cart[$id]['price'] / $cart[$id]['quantity'] * $quantity;
        }

        Session::put('cart', $cart);
        return response()->json($cart);
    }

    // Remove item
    public function remove($id)
    {
        $cart = Session::get('cart', []);
        if(isset($cart[$id])) {
            unset($cart[$id]);
        }
        Session::put('cart', $cart);
        return response()->json($cart);
    }
}
