<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

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
    $products = Product::where('category_id', $id)->latest()->get();

    return view('user.category-detail', compact('category', 'products'));
}

    // ✅ Products page
  public function products()
{
    $products = \App\Models\Product::latest()->get();
    return view('user.products', compact('products'));
}
// ✅ Show single product detail
public function productDetail($id)
{
    $product = \App\Models\Product::findOrFail($id);
    return view('user.product-detail', compact('product'));
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
