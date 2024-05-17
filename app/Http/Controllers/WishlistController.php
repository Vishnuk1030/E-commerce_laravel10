<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;

class WishlistController extends Controller
{
    public function addProductTowishlist(Request $request)
    {
        Cart::instance("wishlist")->add($request->id, $request->name, 1, $request->price)->associate('App\Models\Product');
        return response()->json(['status' => 200, 'message' => 'Success ! item  Successfully Added to your wishlist']);
    }
}
