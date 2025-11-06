<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class UserController extends Controller
{
    // ✅ Home page
    public function home()
    {
        return view('user.home');
    }

    // ✅ About page
    public function about()
    {
        return view('user.about');
    }

    // ✅ Category page
 public function category()
    {
        $categories = Category::latest()->get();
        return view('user.category', compact('categories'));
    }

    // Show single category details
    public function categoryDetail($id)
    {
        $category = Category::findOrFail($id);
        return view('user.category-detail', compact('category'));
    }
    // ✅ Products page
  public function products()
{
    $products = \App\Models\Product::latest()->get();
    return view('user.products', compact('products'));
}


    // ✅ Gallery page
    public function gallery()
    {
        return view('user.gallery');
    }

    // ✅ Contact page
    public function contact()
    {
        return view('user.contact');
    }
}
