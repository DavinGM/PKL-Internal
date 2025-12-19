<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Tampilkan isi keranjang
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        $total = collect($cart)->sum(function ($item) {
            return $item['product']->display_price * $item['qty'];
        });

        return view('cart.index', compact('cart', 'total'));
    }

    /**
     * Tambah produk ke keranjang
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity'   => ['required', 'integer', 'min:1'],
        ]);

        $product = Product::active()->inStock()->findOrFail($request->product_id);
        $cart = session()->get('cart', []);

        $qty = min($request->quantity, $product->stock);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['qty'] += $qty;
        } else {
            $cart[$product->id] = [
                'product' => $product,
                'qty'     => $qty,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Produk ditambahkan ke keranjang.');
    }

    /**
     * Update jumlah produk
     */
    public function update(Request $request, $productId)
    {
        $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $cart = session()->get('cart', []);

        if (! isset($cart[$productId])) {
            return back();
        }

        $product = $cart[$productId]['product'];
        $cart[$productId]['qty'] = min($request->quantity, $product->stock);

        session()->put('cart', $cart);

        return back();
    }

    /**
     * Hapus produk dari keranjang
     */
    public function remove($productId)
    {
        $cart = session()->get('cart', []);

        unset($cart[$productId]);

        session()->put('cart', $cart);

        return back()->with('success', 'Produk dihapus dari keranjang.');
    }
}
