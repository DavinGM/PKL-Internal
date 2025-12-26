<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth; // Tambahkan ini!

class OrderController extends Controller
{
    public function index()
    {
        // Admin melihat semua pesanan dengan pagination
        $orders = Order::with('user')->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // Hapus check "Auth::id()" jika ini untuk Admin agar admin bisa buka semua order
        
        $order->load('items');

        // Logic Midtrans (Biasanya ini lebih cocok di Controller sisi User, bukan Admin)
        if ($order->status == 'pending' && !$order->snap_token) {
            \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
            \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $params = [
                'transaction_details' => [
                    'order_id' => $order->order_number,
                    'gross_amount' => (int) $order->total_amount,
                ],
                'customer_details' => [
                    // Ambil data dari user pemilik order, bukan user yang sedang login (Admin)
                    'first_name' => $order->user->name,
                    'email' => $order->user->email,
                ],
            ];

            try {
                $snapToken = \Midtrans\Snap::getSnapToken($params);
                $order->snap_token = $snapToken;
                $order->save();
            } catch (\Exception $e) {
                // Beri log jika gagal agar admin tahu
                \Log::error('Midtrans Error: ' . $e->getMessage());
            }
        }

        // Pastikan path view benar (apakah admin.orders.show atau orders.show?)
        return view('admin.orders.show', compact('order'));
    }
}