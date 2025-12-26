<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistService
{
 
    public function toggle(Product $product): array
    {
        $userId = Auth::id();

        // Safety check (harusnya sudah lewat middleware auth)
        if (!$userId) {
            abort(401, 'Unauthorized');
        }

        $exists = Wishlist::where('user_id', $userId)
            ->where('product_id', $product->id)
            ->exists();

        if ($exists) {
            Wishlist::where('user_id', $userId)
                ->where('product_id', $product->id)
                ->delete();

            return [
                'added' => false,
                'message' => 'Produk dihapus dari wishlist',
            ];
        }

        Wishlist::create([
            'user_id' => $userId,
            'product_id' => $product->id,
        ]);

        return [
            'added' => true,
            'message' => 'Produk ditambahkan ke wishlist',
        ];
    }

    public function all()
    {
        return Wishlist::with('product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
    }

    public function isWishlisted(Product $product): bool
    {
        return Wishlist::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->exists();
    }

    public function count(): int
    {
        return Wishlist::where('user_id', Auth::id())->count();
    }
}
