<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    // Display all products
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    // Show product creation form
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048'
        ]);

        $data = $request->only(['name', 'category_id', 'description', 'price', 'stock']);

        if ($request->hasFile('image')) {
            if (!file_exists(public_path('storage/products'))) {
                mkdir(public_path('storage/products'), 0777, true);
            }

            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/products'), $filename);
            $data['image'] = 'products/' . $filename;
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully');
    }

    // Show edit form
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Update product
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048'
        ]);

        $data = $request->only(['name', 'category_id', 'description', 'price', 'stock']);

        if ($request->hasFile('image')) {
            if ($product->image && File::exists(public_path('storage/' . $product->image))) {
                File::delete(public_path('storage/' . $product->image));
            }

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

    // Delete product
    public function destroy(Product $product)
    {
        if ($product->image && File::exists(public_path('storage/' . $product->image))) {
            File::delete(public_path('storage/' . $product->image));
        }

        $product->delete();
        return back()->with('success', 'Product deleted successfully');
    }
}
