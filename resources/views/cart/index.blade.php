{{-- ================================================
     FILE: resources/views/cart/index.blade.php
     FUNGSI: Halaman keranjang belanja
================================================ --}}

@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container mx-auto py-6 px-4">
    <h2 class="text-2xl font-semibold mb-6 flex items-center gap-2">
        <i class="bi bi-cart3"></i> Keranjang Belanja
    </h2>

    @if($cart && $cart->items->count())
        <div class="flex flex-col lg:flex-row gap-6">

            {{-- Cart Items --}}
            <div class="w-full lg:w-2/3">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left w-1/2">Produk</th>
                                <th class="px-4 py-2 text-center">Harga</th>
                                <th class="px-4 py-2 text-center">Jumlah</th>
                                <th class="px-4 py-2 text-right">Subtotal</th>
                                <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($cart->items as $item)
                                <tr>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-3">
                                            <img src="{{ $item->product->image_url }}"
                                                 class="w-16 h-16 object-cover rounded"
                                                 alt="{{ $item->product->name }}">
                                            <div>
                                                <a href="{{ route('catalog.show', $item->product->slug) }}"
                                                   class="text-gray-800 font-medium hover:underline">
                                                    {{ Str::limit($item->product->name, 40) }}
                                                </a>
                                                <div class="text-gray-500 text-sm">
                                                    {{ $item->product->category->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center px-4 py-3 text-gray-700">
                                        {{ $item->product->formatted_price }}
                                    </td>
                                    <td class="text-center px-4 py-3">
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="number" name="quantity"
                                                   value="{{ $item->quantity }}"
                                                   min="1" max="{{ $item->product->stock }}"
                                                   class="w-16 text-center border rounded"
                                                   onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    <td class="text-right px-4 py-3 font-semibold">
                                        Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-red-600 hover:text-red-800"
                                                    onclick="return confirm('Hapus item ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Order Summary --}}
            <div class="w-full lg:w-1/3">
                <div class="bg-white shadow rounded-lg p-6 space-y-4">
                    <h5 class="text-lg font-semibold">Ringkasan Belanja</h5>

                    <div class="flex justify-between text-gray-700">
                        <span>Total Harga ({{ $cart->items->sum('quantity') }} barang)</span>
                        <span>Rp {{ number_format($cart->items->sum('subtotal'), 0, ',', '.') }}</span>
                    </div>

                    <hr class="border-gray-200">

                    <div class="flex justify-between font-bold text-blue-600 text-lg">
                        <span>Total</span>
                        <span>Rp {{ number_format($cart->items->sum('subtotal'), 0, ',', '.') }}</span>
                    </div>

                    <a href="{{ route('checkout.index') }}"
                       class="block bg-blue-600 text-white text-center py-2 rounded hover:bg-blue-700">
                        <i class="bi bi-credit-card me-2"></i> Checkout
                    </a>
                    <a href="{{ route('catalog.index') }}"
                       class="block border border-gray-300 text-center py-2 rounded hover:bg-gray-50">
                        <i class="bi bi-arrow-left me-2"></i> Lanjut Belanja
                    </a>
                </div>
            </div>

        </div>
    @else
        {{-- Empty Cart --}}
        <div class="text-center py-20 space-y-4">
            <i class="bi bi-cart-x text-gray-300 text-7xl"></i>
            <h4 class="text-xl font-semibold">Keranjang Kosong</h4>
            <p class="text-gray-500">Belum ada produk di keranjang belanja kamu</p>
            <a href="{{ route('catalog.index') }}"
               class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
               <i class="bi bi-bag me-2"></i> Mulai Belanja
            </a>
        </div>
    @endif
</div>
@endsection
