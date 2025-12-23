<?php

if (! function_exists('cartCount')) {
    function cartCount(): int
    {
        $cart = session('cart');

        if (! $cart || empty($cart['items'])) {
            return 0;
        }

        return collect($cart['items'])->sum('qty');
    }
}
