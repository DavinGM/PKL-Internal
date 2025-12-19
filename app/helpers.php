<?php

if (! function_exists('cartCount')) {
    function cartCount()
    {
        return collect(session('cart', []))->sum('qty');
    }
}
