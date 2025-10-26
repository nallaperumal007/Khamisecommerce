<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard() {
        return view('account.dashboard');
    }

    public function products() {
        $products = Product::with('category')->get();
        return view('account.products', compact('products'));
    }

    public function categories() {
        $categories = Category::all();
        return view('account.categories', compact('categories'));
    }

    public function orders() {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('account.orders', compact('orders'));
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login'); 
    }
}
