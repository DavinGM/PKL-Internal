<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartService
{

    public function getCart(): Cart
    {
        return Cart::firstOrCreate([
            'user_id'    => Auth::id(),
            'session_id' => Auth::check() ? null : session()->getId(),
        ]);
    }

    public function add(Product $product, int $qty): void
    {
        $cart = $this->getCart();

        $item = $cart->items()->firstOrCreate(
            ['product_id' => $product->id],
            ['price' => $product->display_price]
        );

        $item->quantity = min(
            $item->quantity + $qty,
            $product->stock
        );

        $item->save();
    }

    public function update(int $itemId, int $qty): void
    {
        $cart = $this->getCart();
        $item = $cart->items()->findOrFail($itemId);

        $item->quantity = $qty;
        $item->save();
    }

    public function remove(int $itemId): void
    {
        $this->getCart()->items()->where('id', $itemId)->delete();
    }

    public function total(): int
    {
        return $this->getCart()
            ->items
            ->sum(fn ($i) => $i->price * $i->quantity);
    }

    public function count(): int
{
    return $this->getCart()
        ->items
        ->sum('quantity');
}
    



}
