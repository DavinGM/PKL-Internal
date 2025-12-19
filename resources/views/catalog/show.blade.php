{{-- ================================================
     FILE: resources/views/catalog/show.blade.php
     FUNGSI: Halaman detail produk
================================================ --}}

@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container mx-auto py-6 px-4">

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-6 text-sm text-gray-500">
        <ol class="flex flex-wrap gap-2">
            <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
            <li>/</li>
            <li><a href="{{ route('catalog.index') }}" class="hover:underline">Katalog</a></li>
            <li>/</li>
            <li>
                <a href="{{ route('catalog.index', ['category' => $product->category->slug]) }}"
                   class="hover:underline">
                   {{ $product->category->name }}
                </a>
            </li>
            <li>/</li>
            <li class="font-semibold">{{ Str::limit($product->name, 30) }}</li>
        </ol>
    </nav>

    <div class="flex flex-col lg:flex-row gap-6">

        {{-- Product Images --}}
        <div class="w-full lg:w-1/2">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="relative">
                    <img src="{{ $product->image_url }}"
                         id="main-image"
                         alt="{{ $product->name }}"
                         class="w-full h-96 object-contain bg-gray-100">

                    @if($product->has_discount)
                        <span class="absolute top-3 left-3 bg-red-600 text-white text-sm px-2 py-1 rounded">
                            -{{ $product->discount_percentage }}%
                        </span>
                    @endif
                </div>

                {{-- Thumbnail Gallery --}}
                @if($product->images->count() > 1)
                    <div class="p-4 flex gap-2 overflow-x-auto">
                        @foreach($product->images as $image)
                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                 class="w-20 h-20 object-cover rounded border cursor-pointer hover:ring-2 hover:ring-blue-500"
                                 onclick="document.getElementById('main-image').src = this.src">
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        {{-- Product Info --}}
        <div class="w-full lg:w-1/2">
            <div class="bg-white shadow rounded-lg p-6 space-y-4">

                {{-- Category --}}
                <a href="{{ route('catalog.index', ['category' => $product->category->slug]) }}"
                   class="inline-block bg-gray-100 text-gray-700 text-sm px-2 py-1 rounded">
                   {{ $product->category->name }}
                </a>

                {{-- Title --}}
                <h2 class="text-2xl font-semibold">{{ $product->name }}</h2>

                {{-- Price --}}
                <div class="space-y-1">
                    @if($product->has_discount)
                        <div class="line-through text-gray-400 text-sm">
                            {{ $product->formatted_original_price }}
                        </div>
                    @endif
                    <div class="text-2xl text-blue-600 font-bold">
                        {{ $product->formatted_price }}
                    </div>
                </div>

                {{-- Stock Status --}}
                <div>
                    @if($product->stock > 10)
                        <span class="bg-green-100 text-green-800 text-sm px-2 py-1 rounded inline-flex items-center">
                            <i class="bi bi-check-circle mr-1"></i> Stok Tersedia
                        </span>
                    @elseif($product->stock > 0)
                        <span class="bg-yellow-100 text-yellow-800 text-sm px-2 py-1 rounded inline-flex items-center">
                            <i class="bi bi-exclamation-triangle mr-1"></i> Stok Tinggal {{ $product->stock }}
                        </span>
                    @else
                        <span class="bg-red-100 text-red-700 text-sm px-2 py-1 rounded inline-flex items-center">
                            <i class="bi bi-x-circle mr-1"></i> Stok Habis
                        </span>
                    @endif
                </div>

                {{-- Add to Cart Form --}}
                <form action="{{ route('cart.add') }}" method="POST" class="space-y-3">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="flex items-center gap-3">
                        <div>
                            <label class="block text-sm mb-1">Jumlah</label>
                            <div class="flex border rounded overflow-hidden w-36">
                                <button type="button" class="px-2 bg-gray-200 hover:bg-gray-300"
                                        onclick="decrementQty()">-</button>
                                <input type="number" name="quantity" id="quantity" value="1" min="1"
                                       max="{{ $product->stock }}" class="w-full text-center border-l border-r">
                                <button type="button" class="px-2 bg-gray-200 hover:bg-gray-300"
                                        onclick="incrementQty()">+</button>
                            </div>
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex-1"
                                @if($product->stock == 0) disabled @endif>
                            <i class="bi bi-cart-plus mr-2"></i> Tambah ke Keranjang
                        </button>
                    </div>
                </form>

                {{-- Wishlist --}}
                @auth
                    <button type="button"
                            onclick="toggleWishlist({{ $product->id }})"
                            class="w-full border border-red-500 text-red-500 px-4 py-2 rounded hover:bg-red-50 flex items-center justify-center">
                        <i class="bi {{ auth()->user()->hasInWishlist($product) ? 'bi-heart-fill' : 'bi-heart' }} mr-2"></i>
                        {{ auth()->user()->hasInWishlist($product) ? 'Hapus dari Wishlist' : 'Tambah ke Wishlist' }}
                    </button>
                @endauth

                <hr class="my-4">

                {{-- Product Details --}}
                <div>
                    <h6 class="font-semibold mb-2">Deskripsi</h6>
                    <p class="text-gray-500">{!! nl2br(e($product->description)) !!}</p>
                </div>

                <div class="grid grid-cols-2 gap-4 text-gray-500 text-sm mt-3">
                    <div class="flex items-center gap-1">
                        <i class="bi bi-box"></i> Berat: {{ $product->weight }} gram
                    </div>
                    <div class="flex items-center gap-1">
                        <i class="bi bi-tag"></i> SKU: PROD-{{ $product->id }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function incrementQty() {
    const input = document.getElementById('quantity');
    const max = parseInt(input.max);
    if (parseInt(input.value) < max) input.value = parseInt(input.value) + 1;
}
function decrementQty() {
    const input = document.getElementById('quantity');
    if (parseInt(input.value) > 1) input.value = parseInt(input.value) - 1;
}
</script>
@endpush
@endsection
