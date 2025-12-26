<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\WishlistService;

class WishlistController extends Controller
{

    public function __construct()
        {
            $this->middleware('auth');
        }


    public function index(WishlistService $wishlist)
    {
        return view('wishlist.index', [
            'items' => $wishlist->all(),
        ]);
    }

    
    public function toggle(Product $product, WishlistService $wishlist)
    {
        $result = $wishlist->toggle($product);

        return response()->json([
            'status'  => 'success',
            'added'   => $result['added'],
            'message' => $result['message'],
            'count'   => $wishlist->count(),
        ]);
    }
}
