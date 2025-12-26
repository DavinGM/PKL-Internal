<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    // Tambahkan product_id dan kolom lainnya ke dalam fillable
    protected $fillable = [
        'order_id',    // ID pesanan induk
        'product_id',  // ID produk yang dibeli
        'product_name', // Tambahkan ini
        'quantity',    // Jumlah beli
        'price',       // Harga saat dibeli (snapshot)
        'subtotal', // Pastikan ini ada
    ];

    /**
     * Relasi ke Produk
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relasi ke Order
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}