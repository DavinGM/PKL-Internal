@extends('layouts.app')

@section('title', 'Wishlist Saya')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">

    <h1 class="text-2xl font-bold text-white mb-6">
        Wishlist Saya
    </h1>

    @if($items->count())
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($items as $item)
    @php($product = $item->product)

    <div class="bg-gray-800 rounded-xl overflow-hidden">
        <img
            src="{{ $product->primaryImage?->url ?? 'https://via.placeholder.com/400x500' }}"
            class="h-56 w-full object-cover">

        <div class="p-4">
            <h4 class="text-white font-semibold mb-2">
                {{ $product->name }}
            </h4>

            <p class="text-purple-400 font-bold mb-3">
                {{ $product->formatted_price }}
            </p>

            <a href="{{ route('catalog.show', $product->slug) }}"
               class="block text-center bg-purple-600 hover:bg-purple-700 text-white py-2 rounded-lg">
                Detail Produk
            </a>
        </div>
    </div>
@endforeach

        </div>

    @else
        <div class="flex flex-col items-center justify-center py-20 text-center">
            <div class="text-6xl mb-4">🤍</div>
            <h2 class="text-lg font-semibold text-white">
                Wishlist masih kosong
            </h2>
            <p class="text-sm text-gray-400 mt-1">
                Simpan produk favorit kamu di sini.
            </p>
            <a href="{{ route('catalog.index') }}"
               class="mt-6 inline-block px-6 py-3 rounded-xl bg-purple-600 text-white font-semibold hover:bg-purple-700 transition">
                Jelajahi Produk
            </a>
        </div>
    @endif

</div>
@endsection
