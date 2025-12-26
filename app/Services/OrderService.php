<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderService
{
    public function createOrder($user, array $shippingData)
    {
        return DB::transaction(function () use ($user, $shippingData) {
            $cart = $user->cart;

            // 1. Hitung Total Amount dari semua item di keranjang
            $totalAmount = $cart->items->sum(function ($item) {
                return $item->price * $item->quantity;
            });

            // 2. Buat Data Order Utama
            $order = Order::create([
                'user_id'          => $user->id,
                'order_number'     => 'ORD-' . strtoupper(Str::random(10)),
                'status'           => 'pending',
                'total_amount'     => $totalAmount,
                'shipping_name'    => $shippingData['shipping_name'],
                'shipping_phone'   => $shippingData['shipping_phone'],
                'shipping_address' => $shippingData['shipping_address'],
                'notes'            => $shippingData['notes'] ?? null,
            ]);

            // 3. Pindahkan item dari Cart ke Order Items
            foreach ($cart->items as $item) {
                // Validasi Stok
                if ($item->product->stock < $item->quantity) {
                    throw new \Exception("Stok produk {$item->product->name} tidak mencukupi.");
                }

                // Hitung subtotal untuk item ini (Price x Qty)
                $itemSubtotal = $item->price * $item->quantity;

                // Simpan ke OrderItems dengan data lengkap
                OrderItem::create([
                    'order_id'     => $order->id,
                    'product_id'   => $item->product_id,
                    'product_name' => $item->product->name, // Mengatasi error NOT NULL product_name
                    'quantity'     => $item->quantity,
                    'price'        => $item->price,        // Snapshot harga
                    'subtotal'     => $itemSubtotal,      // Mengatasi error NOT NULL subtotal
                ]);

                // 4. Potong Stok Produk
                $item->product->decrement('stock', $item->quantity);
            }

            // 5. Kosongkan Keranjang setelah Checkout Berhasil
            $cart->items()->delete();
            $cart->delete();

            return $order;
        });
    }
}