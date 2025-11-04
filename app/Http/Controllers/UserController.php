<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('user.category');
    }

    // ✅ Products page
    public function products()
    {
        return view('user.products');
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
