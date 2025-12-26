<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config; // Tambahkan ini
use Midtrans\Snap;   // Tambahkan ini

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke pesanan ini.');
        }

        $order->load('items.product');

        // --- MULAI INTEGRASI MIDTRANS ---
        
        // 1. Jika statusnya masih 'unpaid' (atau sesuai kolom statusmu), generate Snap Token
        if ($order->status == 'unpaid') { // Sesuaikan nama kolom status di database mu
            
            // Konfigurasi Midtrans
            Config::$serverKey = config('services.midtrans.serverKey');
            Config::$isProduction = config('services.midtrans.isProduction');
            Config::$isSanitized = config('services.midtrans.isSanitized');
            Config::$is3ds = config('services.midtrans.is3ds');

            // Jika sudah ada snap_token di database, tidak perlu minta baru
            if (!$order->snap_token) {
                $params = [
                    'transaction_details' => [
                        'order_id' => $order->number, // Pastikan ada kolom 'number' atau 'id' yang unik
                        'gross_amount' => (int) $order->total_price,
                    ],
                    'customer_details' => [
                        'first_name' => Auth::user()->name,
                        'email' => Auth::user()->email,
                    ],
                    // Optional: masukkan detail barang
                    'item_details' => $order->items->map(function ($item) {
                        return [
                            'id' => $item->product_id,
                            'price' => (int) $item->price,
                            'quantity' => $item->quantity,
                            'name' => $item->product->name,
                        ];
                    })->toArray(),
                ];

                try {
                    $snapToken = Snap::getSnapToken($params);
                    $order->snap_token = $snapToken;
                    $order->save();
                } catch (\Exception $e) {
                    // Jika error, kamu bisa log atau biarkan snapToken kosong
                    logger($e->getMessage());
                }
            }
        }

        // Kirim $order ke view, snap_token sudah nempel di object $order
        return view('orders.show', compact('order'));
    }
}