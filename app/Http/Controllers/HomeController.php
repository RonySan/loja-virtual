<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('active', 1)->orderBy('id', 'desc')->paginate(8);
        return view('home', compact('products'));
    }
}
