<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(12);
        return view('shop', compact('products'));
    }
    public function productDetils($slug)
    {
        $product = product::where('slug', $slug)->first();
        $rproducts = Product::where('slug', '!=', $slug)->inRandomOrder('id')->get()->take(8);
        return view('details', compact('product', 'rproducts'));
    }
}
