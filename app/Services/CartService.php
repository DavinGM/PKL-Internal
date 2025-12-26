<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartService
{
    /**
     * Mendapatkan data Cart milik user yang sedang login.
     * Menggunakan firstOrCreate agar selalu mengembalikan object Cart.
     */
    protected function getOrCreateCart()
    {
        return Cart::firstOrCreate(['user_id' => Auth::id()]);
    }

    /**
     * Mendapatkan cart dengan relasi lengkap untuk ditampilkan di view.
     */
    public function getCart()
    {
        return Cart::with(['items.product.images'])
            ->where('user_id', Auth::id())
            ->first();
    }

    /**
     * Menghitung total belanja.
     */
    public function total()
    {
        $cart = $this->getCart();
        
        if (!$cart || $cart->items->isEmpty()) {
            return 0;
        }

        return $cart->items->sum(function ($item) {
            // Gunakan price yang tersimpan di table cart_items
            return $item->price * $item->quantity;
        });
    }

    /**
     * Badge jumlah item untuk Navbar.
     */
    public function count()
    {
        $cart = $this->getCart();
        return $cart ? (int) $cart->items->sum('quantity') : 0;
    }

    /**
     * Menambahkan produk ke keranjang.
     * SOLUSI ERROR PRICE: Menambahkan 'price' saat create.
     */
    public function add(Product $product, int $qty)
    {
        $cart = $this->getOrCreateCart();

        // Cari apakah produk sudah ada di item keranjang
        $item = $cart->items()->where('product_id', $product->id)->first();

        // Ambil harga saat ini (Gunakan display_price jika ada logika diskon)
        $currentPrice = $product->display_price ?? $product->price;

        if ($item) {
            // Jika sudah ada, update quantity dan update harga ke harga terbaru
            $item->update([
                'quantity' => $item->quantity + $qty,
                'price'    => $currentPrice 
            ]);
        } else {
            // JIKA BARU: Pastikan 'price' diisi agar tidak error NOT NULL
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity'   => $qty,
                'price'      => $currentPrice // FIX ERROR DI SINI
            ]);
        }
        
        return $cart;
    }

    /**
     * Memperbarui jumlah item.
     */
    public function update(int $itemId, int $qty)
    {
        $cart = $this->getCart();
        if (!$cart) return;

        $item = $cart->items()->findOrFail($itemId);
        
        // Validasi stok produk
        if ($qty > $item->product->stock) {
            throw new \Exception("Stok tidak mencukupi. Tersisa: " . $item->product->stock);
        }

        $item->update(['quantity' => $qty]);
    }

    /**
     * Menghapus item.
     */
    public function remove(int $itemId)
    {
        $cart = $this->getCart();
        if ($cart) {
            $cart->items()->where('id', $itemId)->delete();
        }
    }
}