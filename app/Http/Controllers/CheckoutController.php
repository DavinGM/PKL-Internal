<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Menampilkan halaman Form Checkout
     */
    public function index()
    {
        $user = Auth::user();
        $cart = $user->cart;

        // Validasi: Jika keranjang kosong, jangan boleh ke halaman checkout
        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja Anda masih kosong.');
        }

        return view('checkout.index', compact('cart'));
    }

    /**
     * Memproses data checkout menjadi Order
     */
    public function store(Request $request, OrderService $orderService)
    {
        // 1. Validasi Input sesuai Migrasi Orders
        $request->validate([
            'shipping_name'    => 'required|string|max:255',
            'shipping_phone'   => 'required|string|max:20',
            'shipping_address' => 'required|string',
            'notes'            => 'nullable|string',
        ]);

        try {
            // 2. Panggil Service untuk urusan Database (Transaction, Stok, Snapshots)
            // Kita kirim $request->all() yang berisi data alamat
            $order = $orderService->createOrder(Auth::user(), $request->all());

            // 3. Jika Berhasil, lempar ke halaman detail order
            return redirect()->route('orders.show', $order->id)
                             ->with('success', 'Pesanan Anda berhasil dibuat! Silakan selesaikan pembayaran.');

        } catch (\Exception $e) {
            // 4. Jika Gagal (misal stok tiba-tiba habis), kembali ke cart dengan pesan error
            return redirect()->route('cart.index')->with('error', $e->getMessage());
        }
    }
}