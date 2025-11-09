<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    // Show checkout page
    public function index()
    {
        return view('checkout');
    }

    // Store order
    public function store(Request $request)
    {
        $validated = $request->validate([
            'recipient_name' => 'required|string|max:255',
            'address_line1' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'phone_number' => 'required|string|max:20',
            'email_address' => 'required|email|max:255',
            'cart_items' => 'required|json',
            'total' => 'required|numeric',
        ]);

        Order::create($validated);

        // After order success
        return redirect()->route('checkout.success');
    }

    // Thank you page
    public function success()
    {
        return view('thankyou');
    }
}
