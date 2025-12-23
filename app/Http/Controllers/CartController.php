<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Exception;

class CartController extends Controller
{
    protected CartService $cart;



    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }




    public function index()
    {
        return view('cart.index', [
            'cart'  => $this->cart->getCart(),
            'total' => $this->cart->total(),
        ]);
    }



   public function store(Request $request)
{
    $data = $request->validate([
        'product_id' => ['required', 'exists:products,id'],
        'qty'        => ['required', 'integer', 'min:1'],
    ]);

    try {
        $product = Product::active()->inStock()
            ->findOrFail($data['product_id']);

        $this->cart->add($product, $data['qty']);

        return redirect()
            ->route('cart.index')
            ->with('success', 'Produk ditambahkan ke keranjang.');
    } catch (Exception $e) {
        return back()->withErrors($e->getMessage());
    }
}



    public function update(Request $request, int $itemId)
    {
        $data = $request->validate([
            'qty' => ['required', 'integer', 'min:1'],
        ]);

        try {
            $this->cart->update($itemId, $data['qty']);
            return back();
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }




    public function destroy(int $itemId)
    {
        $this->cart->remove($itemId);
        return back()->with('success', 'Item dihapus.');
    }
}
