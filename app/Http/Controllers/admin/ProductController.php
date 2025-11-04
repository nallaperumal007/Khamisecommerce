<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {

            // Ensure directory exists
            if (!file_exists(public_path('storage/products'))) {
                mkdir(public_path('storage/products'), 0777, true);
            }

            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            // Move file directly to public/storage/products
            $file->move(public_path('storage/products'), $filename);

            // Save relative path in DB
            $data['image'] = 'products/' . $filename;
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {

            // Delete old image if exists
            if ($product->image && File::exists(public_path('storage/'.$product->image))) {
                File::delete(public_path('storage/'.$product->image));
            }

            // Ensure directory exists
            if (!file_exists(public_path('storage/products'))) {
                mkdir(public_path('storage/products'), 0777, true);
            }

            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/products'), $filename);

            $data['image'] = 'products/' . $filename;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        // Delete image if exists
        if ($product->image && File::exists(public_path('storage/'.$product->image))) {
            File::delete(public_path('storage/'.$product->image));
        }

        $product->delete();

        return back()->with('success', 'Product deleted successfully');
    }
}
