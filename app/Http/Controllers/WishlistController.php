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
    public function getWishlistedProducts()
    {
        $items = Cart::instance('wishlist')->content();
        return view('wishlist', compact('items'));
    }
    public function removeProductFromWishlist(Request $request)
    {
        $rowId = $request->rowId;
        Cart::instance("wishlist")->remove($rowId);
        return redirect()->route('wishlist.product.list')->with('success', 'Successfully! Product removed from wishlist');
    }
    public function ClearWishlist()
    {
        Cart::instance("wishlist")->destroy();
        return redirect()->route('wishlist.product.list')->with('success', 'Successfully! Product cleared from wishlist');
    }
    public function moveToCart(Request $request)
    {
        $item = Cart::instance('wishlist')->get($request->rowId);
        Cart::instance("wishlist")->remove($request->rowId);
        Cart::instance('cart')->add($item->model->id, $item->model->name, 1, $item->model->regular_price)->associate('App\Models\Product');
        return redirect()->route('wishlist.product.list')->with('success','Successfully added to the cart.!');
    }
}
